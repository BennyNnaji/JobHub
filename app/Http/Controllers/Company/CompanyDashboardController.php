<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyDashboardController extends Controller
{
    public function company_dashboard()
    {
        $jobs = Job::where('company_id', Auth::guard('company')->user()->id)->get();
        $title = "Company Dashboard";
        return view('company.dashboard', compact('title', 'jobs'));
    }
}
