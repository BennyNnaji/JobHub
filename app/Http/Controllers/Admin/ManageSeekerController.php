<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seeker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageSeekerController extends Controller
{
    protected $guard = 'admin';
    public function index(){
        $title = 'Manage Seekers';
        $seekers = Seeker::paginate(25);
        return view('admin.seeker.index', compact('title', 'seekers'));
    }

    public function admin_seeker_show($id){
        $seeker = Seeker::find($id);
        $title = 'Seeker Details';
        return view('admin.seeker.show', compact('seeker', 'title'));
    }
    public function active_seekers(){
        $title = 'Active Seekers';
        $seekers = Seeker::where('status', 1)->paginate(25);
        return view('admin.seeker.active', compact('title', 'seekers'));
    }
    public function inactive_seekers(){
        $title = 'Inactive Seekers';
        $seekers = Seeker::where('status', 0)->paginate(25);
        return view('admin.seeker.inactive', compact('title','seekers')); 
    }

    public function verified_seekers(){
        $title = 'Verified Seekers';
        $seekers = Seeker::where('verified', 1)->paginate(25);
        return view('admin.seeker.verified', compact('title','seekers')); 
    }
    public function unverified_seekers(){
        $title = 'Unverified Seekers';
        $seekers = Seeker::where('verified', 0)->paginate(25);
        return view('admin.seeker.unverified', compact('title','seekers')); 
    }
}
