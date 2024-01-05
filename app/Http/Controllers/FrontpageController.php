<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontpageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->paginate(10);
        $title = 'Home';
        return view('index', compact('title', 'jobs'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::where('id', $id)->findOrFail($id);
        $title = $job->job_title;
        return view('jobs', compact('title', 'job'));
    }
    

    public function register()
    {
        $title = "Register";
        if (Auth::guard('company')->check()) {
            return redirect()->route('company_dashboard');
        } elseif(Auth::guard('seeker')->check()) {
            return redirect()->route('seeker_profile');
        }else{
            return view('register', compact('title'));
        }
    }


    public function login()
    {
        $title = "Login";
        if (Auth::guard('company')->check()) {
            return redirect()->route('company_dashboard');
        }  elseif(Auth::guard('seeker')->check()) {
            return redirect()->route('seeker_profile');
        } else {
        return view('login', compact('title'));
        }
    }
public function pages(String $pages){
//     $about = [About::all(),
//                 Contact::all(),
//                 Services::all()
// ];
    if (!in_array($pages, ['about', 'contact', 'privacy', 'terms', 'blog'])) {
        abort(404);
    }
    return view($pages);
}

}
