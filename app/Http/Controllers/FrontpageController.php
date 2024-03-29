<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontpageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')
            ->where('job_status', 1)
            ->where('deadline', '>=', now()->toDateString())
            ->paginate(12);
        $title = 'Home';
        return view('index', compact('title', 'jobs'));
    }

    public function jobs()
    {
        $jobs = Job::orderBy('created_at', 'desc')
            ->where('job_status', 1)
            ->where('deadline', '>=', now()->toDateString())
            ->paginate(12);
        $title = 'Jobs';
        return view('jobs', compact('title', 'jobs'));
    }
    public function job_search(Request $request)
    {
        $keyword = $request->input('keyword');
        $location = $request->input('location');
        $category = $request->input('category');
        $jobs = Job::where('job_title', 'LIKE', '%' . $keyword . '%')
            ->where('job_location', 'LIKE', '%' . $location . '%')
            ->where('category', 'LIKE', '%' . $category . '%')
            ->where('job_status', 1)
            ->where('deadline', '>=', now()->toDateString())
            ->paginate(12);
        $title = 'Jobs Search Results';
        return view('job_search', compact('title', 'jobs'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::findOrFail($id);
        $application = null;
        if (Auth::guard('seeker')->user()) {
            $application = Application::where('seeker_id', Auth::guard('seeker')->user()->id)
            ->where('job_id', $id)
            ->first();
            if ($application) {
                $application->status = json_decode($application->status, true);
            }
        }
        if ($job->deadline < now()->toDateString() || ($job->job_status != 1)) {
            return redirect()->route('jobs')->with('error', 'Job expired or not active');
        } else {
            $related_jobs = Job::where('category', $job->category)
                ->where('id', '!=', $id)->orderBy('created_at', 'desc')
                ->where('job_status', 1)
                ->where('deadline', '>=', now()->toDateString())
                ->take(10)
                ->get();
            $title = $job->job_title;
            return view('job_details', compact('title', 'job', 'related_jobs', 'application'));
        }
    }


    public function register()
    {
        $title = "Register";
        if (Auth::guard('company')->check()) {
            return redirect()->route('company_dashboard');
        } elseif (Auth::guard('seeker')->check()) {
            return redirect()->route('seeker_profile');
        } else {
            return view('register', compact('title'));
        }
    }


    public function login()
    {
        $title = "Login";
        if (Auth::guard('company')->check()) {
            return redirect()->route('company_dashboard');
        } elseif (Auth::guard('seeker')->check()) {
            return redirect()->route('seeker_profile');
        } else {
            return view('login', compact('title'));
        }
    }
    public function pages(String $pages)
    {
        //     $about = [About::all(),
        //                 Contact::all(),
        //                 Services::all()
        // ];
        if (!in_array($pages, ['about', 'contact', 'privacy', 'terms', 'blog'])) {
            abort(404);
        }
        return view($pages);
    }
    // About
    public function about()
    {
        $title = "About Us";
        return view('about', compact('title'));
    }
}
