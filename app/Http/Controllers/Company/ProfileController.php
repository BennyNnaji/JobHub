<?php

namespace App\Http\Controllers\Company;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        //$company = auth()->user()->company;
        $company = Auth::guard('company')->user();
        $title = "Company Profile";
        $social_media = json_decode($company->social_media, true);
        return view('company.profile', compact('title', 'company', 'social_media'));
    }
    public function profile_update(Request $request)
    {
       $company = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
        'country' => 'required',
        'state' => 'required',
        'city' => 'required',
        'website' => 'required|url',
        'description' => 'required',
        'logo' => 'mimes:png,jpg,jpeg|max:2048',
        'banner' => 'mimes:png,jpg,jpeg|max:2048',
    ], [
        'website.required' => 'The website field is required.',
        'website.url' => 'The website must be a valid URL.',
    ]);
        if ($request->hasFile('logo')) {
            $logo_path =  $request->name.'-logo'.'.'.$request->file('logo')->getClientOriginalExtension();
           $logo =  $request->file('logo')->storeAs('public/company/Images', $logo_path);
        }
       
        if ($request->hasFile('banner')) {
            $banner_path =  $request->name.'-banner'.'.'.$request->file('banner')->getClientOriginalExtension();
           $banner =  $request->file('banner')->storeAs('public/company/Images', $banner_path);
        }

        // $social_media = $request->validate([
        //     'facebook' => 'required',
        //     'twitter' => 'required',
        //     'linkedin' => 'required',
        //     'instagram' => 'required',
        // ]);
        $social_media = [
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
        ];
        $company = Company::find(Auth::guard('company')->user()->id);
        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'website' => $request->website,
            'description' => $request->description,
            'logo' => $logo_path,
           //'banner' => $banner,
            'social_media' => json_encode($social_media),
        ]);
        return redirect()->back()->with('success', 'Profile updated successfully');
    }


}
