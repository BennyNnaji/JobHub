<?php

namespace App\Http\Controllers\Company;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Jobs';
        return view('company.jobs.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Job';
        return view('company.jobs.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
      $validated =   $request->validate([
            'company_id' => 'required',
            'job_title' => 'required',
            'job_type' => 'required',
            'job_description' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required',
            'job_location' => 'required',
            'deadline' => 'required',
            'responsibility' => 'required',
            'benefits' => 'required',
            'job_status' => 'required',
                ]);
  
        
           $job = Job::create([
                'company_id' => Auth::guard('company')->user()->id,
                'job_title' => $request->job_title,
                'job_type' => $request->job_type,
                'job_description' => $request->job_description,
                'min_salary' => $request->min_salary,
                'max_salary' => $request->max_salary,
                'job_location' => $request->job_location,
                'deadline' => $request->deadline,
                'responsibility' => $request->responsibility,
                'benefits' => $request->benefits,
                'job_status' => $request->job_status,
            ]);
            //dd($job);
            if ($job) {
            return redirect()->route('company_jobs')->with('success', 'Job created successfully');
            }else {
            return redirect()->route('company_profile')->with('error', 'error ocurred');
            }
           
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
