<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $guard = 'admin';
    public function admin_dashboard(){
        $title = 'Admin Dashboard';
        $jobs = Job::paginate(25);
        $activeJob = Job::where('job_status', 1)
                         ->where('deadline', '>', now())->count();
        return view('admin.dashboard', compact('title', 'jobs', 'activeJob'));
    }
}
