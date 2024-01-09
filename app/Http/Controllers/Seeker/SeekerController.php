<?php

namespace App\Http\Controllers\Seeker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seeker;
use Illuminate\Support\Facades\Auth;

class SeekerController extends Controller
{
    public function seeker_profile(){
        $title = 'My Profile';
        return view('seeker.profile', compact('title'));
       
    }
    public function update_profile_summary_form(){
        $title = "Update Profile";
        $seeker = Seeker::where('id',  Auth::guard('seeker')->user()->id)->first();
        return view('seeker.editprofile', compact('title', 'seeker'));
    }
    public function update_profile_summary(Request $request){
        //validate the request
        $profile = $request->validate([
            'phone' => 'required',
            'address'=>'required|string',
            'gender'=>'required',
            'birthday'=>'required',
            'country' =>'required',
            'state' => 'required',
        ]);
        $seeker = Seeker::find(Auth::user()->id);
        $seeker->update($profile);
        return redirect()->route('seeker_profile')->with('success', 'Profile Updated');     
        
    }
}