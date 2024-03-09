<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageCompanyController extends Controller
{
    public function index()
    {
        $title = 'Manage Company';
        $companies = Company::paginate(25);
        return view('admin.companies.index', compact('title', 'companies'));
    } 
   
    public function active_companies(){
        $title = 'Active Companies';
        $companies = Company::where('status', 1)->paginate(25);
        return view('admin.companies.active', compact('title', 'companies'));
    }
    public function verified_companies(){
        $title = 'Verified Companies';
        $companies = Company::where('status', 1)->paginate(25);
        return view('admin.companies.verified', compact('title', 'companies'));
    }
    public function unverified_companies(){
        $title = 'Unverified Companies';
        $companies = Company::where('status', 0)->paginate(25);
        return view('admin.companies.unverified', compact('title', 'companies'));
    }

}
