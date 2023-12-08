<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{
    public function showCountryDropdown()
    {
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
        $title = 'Testing';
        $company = Auth::guard('company')->user();
        $social_media = json_decode($company->social_media, true);

        return view('country', compact('countries', 'title', 'company', 'social_media'));
    }

    public function getStatesByCountry($countryCode)
    {
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
}
