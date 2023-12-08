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

            $client = new Client();

        $response = $client->get('https://api.countrystatecity.in/v1/countries', [
            'headers' => [
                'X-CSCAPI-KEY' => 'V2NiSDdQMWFjUU5UNzZUYXJBcVhuT2Rhc1dzTFRleVA4TXZFb2FVdQ==',
            ],
        ]);

        $countries = json_decode($response->getBody(), true);

        // Sort countries by name
        usort($countries, function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        return view('company.profile', compact('title', 'company', 'social_media', 'countries'));
    }

    public function getStatesByCountry(Request $request)
    {
        $countryCode = $request->input('countryCode');
        $client = new Client();

        $response = $client->get("https://api.countrystatecity.in/v1/countries/{$countryCode}/states", [
            'headers' => [
                'X-CSCAPI-KEY' => 'V2NiSDdQMWFjUU5UNzZUYXJBcVhuT2Rhc1dzTFRleVA4TXZFb2FVdQ==',
            ],
        ]);

        $states = json_decode($response->getBody(), true);

        return response()->json($states);
    }

    public function getCitiesByState($countryCode, $stateCode)
    {
        $client = new Client();

        $response = $client->get("https://api.countrystatecity.in/v1/countries/{$countryCode}/states/{$stateCode}/cities", [
            'headers' => [
                'X-CSCAPI-KEY' => 'V2NiSDdQMWFjUU5UNzZUYXJBcVhuT2Rhc1dzTFRleVA4TXZFb2FVdQ==',
            ],
        ]);

        $cities = json_decode($response->getBody(), true);

        return response()->json($cities);
    }




    
    public function profile_update(Request $request)
    {
        //dd($request->all());
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
            $logo_path =  $request->name . '-logo' . '.' . $request->file('logo')->getClientOriginalExtension();
            $logo =  $request->file('logo')->storeAs('public/company/Images', $logo_path);
        } else {
            $logo_path = Auth::guard('company')->user()->logo;
        }

        if ($request->hasFile('banner')) {
            $banner_path =  $request->name . '-banner' . '.' . $request->file('banner')->getClientOriginalExtension();
            $banner =  $request->file('banner')->storeAs('public/company/Images', $banner_path);
        } else {
            $banner_path = Auth::guard('company')->user()->banner;
        }

        $social_media = [
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
        ];
        $company = Company::find(Auth::guard('company')->user()->id);
        $updated = $company->update([
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
            'banner' => $banner_path,
            'social_media' => json_encode($social_media),
        ]);
        if ($updated) {
            return redirect()->back()->with('success', 'Profile updated successfully');

        } else {
            return redirect()->back()->with('error', 'Error ocurred. Please try again');

        }
        
    }
}
