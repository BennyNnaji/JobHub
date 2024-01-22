<?php

namespace App\Http\Controllers\Seeker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seeker;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class SeekerController extends Controller
{
    /**
     * seeker_profile function description.
     *
     * @return \Illuminate\View\View
     */
    public function seeker_profile()
    {
        $title = 'My Profile';
        $seeker =  Seeker::find(Auth::guard('seeker')->user()->id);
        if ($seeker->status != 1) {
            return redirect()->route('seeker_login')->with('error', 'Account not activated');
        } else {
            $seeker->career = json_decode($seeker->career, true) ?? [];
            return view('seeker.profile', compact('title', 'seeker'));
        }
    }
    /**
     * Update the basic profile form.
     *
     * @return view
     */
    public function update_profile_basic_form()
    {
        $title = "Update Profile";
        $seeker = Seeker::where('id',  Auth::guard('seeker')->user()->id)->first();
        return view('seeker.profile_edit', compact('title', 'seeker'));
    }
    /**
     * Update the basic profile information.
     *
     * @param Request $request the HTTP request
     * @throws \Illuminate\Validation\ValidationException description of exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_profile_basic(Request $request)
    {
        //validate the request
        $profile = $request->validate([
            'phone' => 'required',
            'address' => 'required|string',
            'gender' => 'required',
            'birthday' => 'required',
            'country' => 'required',
            'state' => 'required',
        ]);
        $seeker = Seeker::find(Auth::guard('seeker')->user()->id)->first();
        $seeker->update($profile);
        return redirect()->route('seeker_profile')->with('success', 'Profile Updated');
    }
    /**
     * Process the profile summary from the request.
     *
     * @param Request $request The request instance
     * @throws ValidationException description of exception
     * @return RedirectResponse
     */
    public function profile_summary(Request $request)
    {
        $summary = $request->validate([
            'summary' => 'required|string',
        ]);
        $seeker = Seeker::where('id', Auth::guard('seeker')->user()->id)->first();
        $seeker->update($summary);


        return redirect()->route('seeker_profile')->with('success', 'Profile Updated');
    }
    /**
     * Profile career function to add new career entry to user's profile.
     *
     * @param Request $request The HTTP request data
     * @throws 
     * @return \Illuminate\Http\RedirectResponse
     */
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

        return redirect()->route('seeker_profile')->with('success', 'Career Added Successfully');
    }
  


/**
 * Edit the career information for the specified index.
 *
 * @param int $careerIndex The index of the career to be edited
 * @return \Illuminate\View\View
 */
public function profile_career_edit($careerIndex)
{
    $title = "Update Career";
    $seeker = Auth::guard('seeker')->user();

    $careerArray = json_decode($seeker->career, true);

    if (is_array($careerArray) && array_key_exists($careerIndex, $careerArray)) {
        $career = $careerArray[$careerIndex];
        return view('seeker.profile.career_edit', compact('seeker', 'careerIndex', 'career', 'title'));
    } else {
        // Handle the case where the careers array or the specified index does not exist
        return redirect()->route('seeker_profile')->with('error', 'Invalid career index');
    }
}


/**
 * Update the career details of the seeker's profile.
 *
 * @param Request $request The HTTP request
 * @param int $careerIndex The index of the career to update
 * @throws ValidationException if the request data is invalid
 * @return \Illuminate\Http\RedirectResponse after updating the career details
 */
public function profile_career_update(Request $request, $careerIndex)
{
    $seeker = Auth::guard('seeker')->user();
    $careerArray = json_decode($seeker->career, true);

    if (is_array($careerArray) && array_key_exists($careerIndex, $careerArray)) {
        $request->validate([
            'company' => 'required',
            'position' => 'required',
            'from' => 'required|date',
            'to' => 'nullable|date|after_or_equal:from',
            'description' => 'nullable',
        ]);

        $careerArray[$careerIndex] = [
            'company' => $request->input('company'),
            'position' => $request->input('position'),
            'from' => $request->input('from'),
            'to' => $request->input('current') ? null : $request->input('to'),
            'description' => $request->input('description'),
        ];

        $seeker->update(['career' => json_encode($careerArray)]);

        return redirect()->route('seeker_profile')->with('success', 'Career updated successfully');
    } else {
        return redirect()->route('seeker_profile')->with('error', 'Invalid career index');
    }
}


/**
 * Delete a career entry from the seeker's profile.
 *
 * @param datatype $careerIndex The index of the career entry to be deleted
 * @return \Illuminate\Http\RedirectResponse with success or error message
 */
public function profile_career_delete($careerIndex)
    {
        $seeker = Auth::guard('seeker')->user();
        $careerArray = json_decode($seeker->career, true);

        if (is_array($careerArray) && array_key_exists($careerIndex, $careerArray)) {
            // Remove the career entry from the array
            unset($careerArray[$careerIndex]);

            // Reindex the array to maintain consecutive keys
            $careerArray = array_values($careerArray);

            // Update the seeker's career field
            $seeker->update(['career' => json_encode($careerArray)]);

            return redirect()->route('seeker_profile')->with('success', 'Career deleted successfully');
        } else {
            return redirect()->route('seeker_profile')->with('error', 'Invalid career index');
        }
    }
    
}
