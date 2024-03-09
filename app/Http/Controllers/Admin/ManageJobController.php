<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Job;
use App\Models\ReportJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageJobController extends Controller
{
    public function index()
    {
        $title = 'Manage Jobs';
        $jobs = Job::paginate(25);
        return view('admin.jobs.index', compact('title', 'jobs'));
    }
    public function show_job($id)
    {
        $title = 'Job Details';
        $job = Job::find($id);
        return view('admin.jobs.show', compact('title', 'job'));
    }
    public function active_jobs()
    {
        $title = 'Active Jobs';
        $jobs = Job::where('job_status', 1)->paginate(25);
        return view('admin.jobs.active', compact('title', 'jobs'));
    }
    public function pending_jobs()
    {
        $title = 'Pending Jobs';
        $jobs = Job::where('job_status', 0)->paginate(25);
        return view('admin.jobs.pending', compact('title', 'jobs'));
    }

    public function reported_jobs()
    {
        $title = 'Reported Jobs';
        $jobs = ReportJob::with('job.company')
            ->select('job_id', DB::raw('COUNT(id) as reports_count')) // Use COUNT as an example
            ->groupBy('job_id')
            ->orderBy('reports_count', 'desc')
            ->paginate(25);
    
        return view('admin.jobs.reported', compact('title', 'jobs'));
    }

    public function expired_jobs(){
        $title = 'Expired Jobs';
        $jobs = Job::where('deadline', '<', now() . ' 00:00:00 ')->paginate(25);
        return view('admin.jobs.expired', compact('title', 'jobs'));
    }

    public function closed_jobs(){
        $title = 'Closed Jobs';
        $jobs = Job::where('job_status', 'closed')->paginate(25);
        return view('admin.jobs.closed', compact('title', 'jobs'));
    }
}

