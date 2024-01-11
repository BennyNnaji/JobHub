<?php

namespace App\Http\Controllers\Seeker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seeker;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class SeekerController extends Controller
{
    public function seeker_profile(){
        $title = 'My Profile';
        $seeker =  Seeker::find( Auth::guard('seeker')->user()->id);
         //$seeker = auth('seeker')->user();
        $seeker->career = json_decode($seeker->career, true) ?? [];
    return view('seeker.profile', compact('title', 'seeker'));
}
    public function update_profile_basic_form(){
        $title = "Update Profile";
        $seeker = Seeker::where('id',  Auth::guard('seeker')->user()->id)->first();
        return view('seeker.editprofile', compact('title', 'seeker'));
    }
    public function update_profile_basic(Request $request){
        //validate the request
        $profile = $request->validate([
            'phone' => 'required',
            'address'=>'required|string',
            'gender'=>'required',
            'birthday'=>'required',
            'country' =>'required',
            'state' => 'required',
        ]);
        $seeker = Seeker::find( Auth::guard('seeker')->user()->id)->first();
        $seeker->update($profile);
        return redirect()->route('seeker_profile')->with('success', 'Profile Updated');     
        
    }
    public function profile_summary(Request $request) {
       $summary = $request->validate([
        'summary'=>'required|string',
       ]);
       $seeker=Seeker::where('id', Auth::guard('seeker')->user()->id)->first();
         $seeker->update($summary);

       
       return redirect()->route('seeker_profile')->with('success', 'Profile Updated');
    }
public function profile_career(Request $request)
{
$request->validate([
    'company' => 'required',
    'position' => 'required',
    'from' => 'required|date|before:today',
    'to' => 'nullable|date|after_or_equal:from|before_or_equal:today',
    'description' => 'nullable',
]);


    $newCareer = [
        'company' => $request->company,
        'position' => $request->position,
        'from' => date("Y-m-d", strtotime($request->from)),
        'to' => $request->to ? date("Y-m-d", strtotime($request->to)) : null,
        'description' => $request->description,
    ];

    $seeker = auth('seeker')->user();

    $currentCareers = json_decode($seeker->career, true) ?? [];

    // Ensure $currentCareers is an array
    $currentCareers = is_array($currentCareers) ? $currentCareers : [];

    // Add the new career entry to the existing array of careers
    $currentCareers[] = $newCareer;

    $seeker->update(['career' => json_encode($currentCareers)]);

    return redirect()->route('seeker_profile')->with('success', 'Profile Updated');
}

}