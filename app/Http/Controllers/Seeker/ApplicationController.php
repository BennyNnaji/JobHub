<?php

namespace App\Http\Controllers\Seeker;

use App\Models\Job;
use App\Models\Application;
use App\Models\SavedJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ApplicationController extends Controller
{
    public function apply_job($id)
    {
        $job = Job::where('id', $id)->findOrFail($id);
        $title = $job->job_title;
        return view('seeker.applications.apply', compact('job', 'title'));
    }
    public function apply_job_store(Request $request, String $id)
    {
        $request->validate([
            'cover_letter_type' => 'required_without_all:cover_letter_upload',
            'cover_letter_upload' => 'required_without_all:cover_letter_type|mimes:pdf|max:2048',
            'resume' => 'required|mimes:pdf|max:2048'
        ]);
        $job = Job::where('id', $id)->findOrFail($id);


        if ($request->hasFile('resume')) {
            $resume =  Auth::guard('seeker')->user()->name . '-' . $job->job_title . '-' . time() . '-Resume' . '.' . $request->file('resume')->getClientOriginalExtension();
            // $resume_path = $request->file('resume')->storeAs('public/Applications/resumes', $resume);
        }
        if ($request->hasFile('cover_letter_upload')) {
            $cover_letter = Auth::guard('seeker')->user()->name . '-' . $job->job_title . '-' . time() . '-Cover-Letter' . '.' . $request->file('cover_letter_upload')->getClientOriginalExtension();
            //   $cover_letter_path = $request->file('cover_letter_upload')->storeAs('public/Applications/cover_letters', $cover_letter);
        }
        $applied = Application::where('job_id', $job->id)->where('seeker_id', Auth::guard('seeker')->user()->id)->exists();
        if ($applied) {
            return redirect()->route('jobs.show',  $job->id)->with('error', 'You have already applied for this job');
        } else {
            // $application = new Application;
            // $application->job_id = $job->id;
            // $application->seeker_id = Auth::guard('seeker')->user()->id;
            // $application->resume = $resume;
            // $application->cover_letter_type = $request->cover_letter_type;
            // $application->cover_letter_upload = $request->cover_letter_upload;
            // $application->cover_letter_upload = $cover_letter;
            // $application->status = 'pending';
            // $resume_path = $request->file('resume')->storeAs('public/Applications/resumes', $resume);
            // $cover_letter_path = $request->file('cover_letter_upload')->storeAs('public/Applications/cover_letters', $cover_letter);
            // $application->save();
            $application = Application::create([
                'job_id' => $job->id,
                'cover_letter_type' => $request->cover_letter_type,
                'cover_letter_upload' => $request->cover_letter_upload,
                'seeker_id' => Auth::guard('seeker')->user()->id,
                'cover_letter_upload' => $cover_letter,
                'cover_letter_type' => $request->cover_letter_type,
                'status' => 'pending',
                'resume' => $resume,
                $resume_path = $request->file('resume')->storeAs('public/Applications/resumes', $resume),
                $cover_letter_path = $request->file('cover_letter_upload')->storeAs('public/Applications/cover_letters', $cover_letter),
            ]);
            return redirect()->route('jobs.show',  $job->id)->with('success', 'Application sent successfully');
        }
    }
    // save jobs
    public function save_job($id)
    {
        $job = Job::where('id', $id)->findOrFail($id);
        $saved = SavedJob::where('job_id', $job->id)->where('seeker_id', Auth::guard('seeker')->user()->id)->exists();

        // Inside your save_job method
        if ($saved) {
            return redirect()->route('jobs.show',  $job->id)->with('status', 'You have already saved this job');
        } else {
            SavedJob::create([
                'job_id' => $job->id,
                'seeker_id' => Auth::guard('seeker')->user()->id,
            ]);
            return redirect()->route('jobs.show',  $job->id)->with('status', 'Job saved successfully');
        }
    }
}