<?php

namespace App\Http\Controllers\Company;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\ValidStatusTransition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationReceivedMail;
use App\Mail\SeekerApplicationStatus;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function company_applications()
    {

        $companyId = Auth::guard('company')->user()->id;

        $applications = Application::whereHas('job', function ($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })->paginate(10);
        $title = 'Applications';
        return view('company.jobs.applications', compact('title', 'applications'));
    }
    public function application_details($id)
    {
        // Retrieve the application with the specified ID
        $application = Application::findOrFail($id);
        $application->status = json_decode($application->status, true);
        $cleanedResumeName = str_replace(' ', '_', $application->resume);
        $cleanedCoverLetterName = str_replace(' ', '_', $application->cover_letter_upload);

        $resume_url = Storage::url("public/Applications/resumes/{$cleanedResumeName}");
        $CoverLetter_url = Storage::url("public/Applications/resumes/{$cleanedCoverLetterName}");

        //$resume_url = asset("storage/Applications/resumes/{$cleanedResumeName}");

        // Decode JSON fields or use empty arrays if null
        $career = json_decode($application->seeker->career, true) ?? [];
        $education = json_decode($application->seeker->education, true) ?? [];
        $license = json_decode($application->seeker->license, true) ?? [];
        $skill = json_decode($application->seeker->skill, true) ?? [];
        $language = json_decode($application->seeker->language, true) ?? [];

        $title = 'Application Details';

        return view('company.jobs.application_details', compact('title', 'resume_url', 'CoverLetter_url', 'application', 'career', 'education', 'license', 'skill', 'language'));
    }

    public function updateStatus(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $currentStatus = json_decode($application->status, true); // Decode the existing status
        $request->validate([
            'status' => [
                'required',
                'string',
                new ValidStatusTransition($currentStatus['status']), // Pass the current status to the rule
            ],
            'status_details' => 'nullable',
        ]);

        $newStatusDetails = [
            'status' => $request->status,
            'status_details' => $request->status_details,
        ];

        $application->update([
            'status' => json_encode($newStatusDetails), // Encode the new status details as JSON
        ]);

        $data = [
            'seeker' => $application->seeker->name,
            'job_title' => $application->job->job_title,
            'company' => $application->job->company->name,
            'status' => $request->status,
            'status_details' => $request->status_details,
        ];

        Mail::to($application->seeker->email)->send(new SeekerApplicationStatus($data));
        return back()->with('success', 'Status updated successfully');
    }
}
