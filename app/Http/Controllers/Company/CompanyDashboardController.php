<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyDashboardController extends Controller
{
    public function company_dashboard()
    {
        $title = "Company Dashboard";
        return view('company.dashboard', compact('title'));
    }
}
