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
            $seeker->education = json_decode($seeker->education, true) ?? [];
            $seeker->license = json_decode($seeker->license, true) ?? [];
            $seeker->skill = json_decode($seeker->skill, true) ?? [];
            $seeker->language = json_decode($seeker->language, true) ?? [];
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
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'gender' => 'required',
            'birthday' => 'required',
            'country' => 'required',
            'state' => 'required',
        ]);
        $seeker = Seeker::find(Auth::guard('seeker')->user()->id);
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


    // Education 
    public function profile_education(Request $request)
    {
        $request->validate([
            'institution' => 'required',
            'qualification' => 'required',
            'grad_year' => 'required|date',
            'edu_description' => 'nullable',
        ]);

        $newEdu = [
            'institution' => $request->institution,
            'qualification' => $request->qualification,
            'grad_year' => date("Y-m-d", strtotime($request->grad_year)),
            'edu_description' => $request->edu_description,
        ];

        $seeker = auth('seeker')->user();

        $currentEdu = json_decode($seeker->education, true) ?? [];

        // Ensure $currentEdu is an array
        $currentEdu = is_array($currentEdu) ? $currentEdu : [];

        // Add the new Education entry to the existing array of careers
        $currentEdu[] = $newEdu;

        $seeker->update(['education' => json_encode($currentEdu)]);

        return redirect()->route('seeker_profile')->with('success', 'Education Added Successfully');
    }

    public function profile_education_edit($eduIndex)
    {
        $title = "Update Education";
        $seeker = Auth::guard('seeker')->user();

        $eduArray = json_decode($seeker->education, true);

        if (is_array($eduArray) && array_key_exists($eduIndex, $eduArray)) {
            $education = $eduArray[$eduIndex];
            return view('seeker.profile.education_edit', compact('seeker', 'eduIndex', 'education', 'title'));
        } else {
            // Handle the case where the Education  array or the specified index does not exist
            return redirect()->route('seeker_profile')->with('error', 'Invalid education index');
        }
    }



    public function profile_education_update(Request $request, $eduIndex)
    {
        $seeker = Auth::guard('seeker')->user();
        $eduArray = json_decode($seeker->education, true);

        if (is_array($eduArray) && array_key_exists($eduIndex, $eduArray)) {
            $request->validate([
                'institution' => 'required',
                'qualification' => 'required',
                'grad_year' => 'required|date',
                'edu_description' => 'nullable',
            ]);

            $eduArray[$eduIndex] = [
                'institution' => $request->institution,
                'qualification' => $request->qualification,
                'grad_year' => date("Y-m-d", strtotime($request->grad_year)),
                'edu_description' => $request->edu_description,
            ];

            $seeker->update(['education' => json_encode($eduArray)]);

            return redirect()->route('seeker_profile')->with('success', 'Education updated successfully');
        } else {
            return redirect()->route('seeker_profile')->with('error', 'Invalid Education index');
        }
    }

    public function profile_education_delete($eduIndex)
    {
        $seeker = Auth::guard('seeker')->user();
        $eduArray = json_decode($seeker->education, true);

        if (is_array($eduArray) && array_key_exists($eduIndex, $eduArray)) {
            // Remove the Edu entry from the array
            unset($eduArray[$eduIndex]);

            // Reindex the array to maintain consecutive keys
            $eduArray = array_values($eduArray);

            // Update the seeker's education field
            $seeker->update(['education' => json_encode($eduArray)]);

            return redirect()->route('seeker_profile')->with('success', 'Education deleted successfully');
        } else {
            return redirect()->route('seeker_profile')->with('error', 'Invalid education index');
        }
    }

    // End of Education

    // License
    public function profile_license(Request $request)
    {
        $request->validate([
            'license_name' => 'required',
            'issuing_org' => 'required',
            'issued_date' => 'required|date',
            'exp_date' => 'nullable|date',
            'description' => 'nullable',
        ]);

        $newLic = [
            'license_name' => $request->license_name,
            'issuing_org' => $request->issuing_org,
            'issued_date' => date("Y-m-d", strtotime($request->issued_date)),
            'exp_date' => $request->never ? null : ($request->exp_date ? date("Y-m-d", strtotime($request->exp_date)) : null),
            //'exp_date' => $request->exp_date ? date("Y-m-d", strtotime($request->exp_date)) : null,
            'description' => $request->description,
        ];

        $seeker = auth('seeker')->user();

        $currentLic = json_decode($seeker->license, true) ?? [];

        // Ensure $currentLic is an array
        $currentLic = is_array($currentLic) ? $currentLic : [];

        // Add the new Education entry to the existing array of careers
        $currentLic[] = $newLic;

        $seeker->update(['license' => json_encode($currentLic)]);

        return redirect()->route('seeker_profile')->with('success', 'License Added Successfully');
    }
    public function profile_license_edit($licenseIndex)
    {
        $title = "Update License";
        $seeker = Auth::guard('seeker')->user();

        $licArray = json_decode($seeker->license, true);

        if (is_array($licArray) && array_key_exists($licenseIndex, $licArray)) {
            $license = $licArray[$licenseIndex];
            return view('seeker.profile.license_edit', compact('seeker', 'licenseIndex', 'license', 'title'));
        } else {
            // Handle the case where the license  array or the specified index does not exist
            return redirect()->route('seeker_profile')->with('error', 'Invalid license index');
        }
    }

    public function profile_license_update(Request $request, $licenseIndex)
    {
        $seeker = Auth::guard('seeker')->user();
        $licArray = json_decode($seeker->license, true);
        if (is_array($licArray) && array_key_exists($licenseIndex, $licArray)) {

            $request->validate([
                'license_name' => 'required',
                'issuing_org' => 'required',
                'issued_date' => 'required|date',
                'exp_date' => 'nullable|date',
                'description' => 'nullable',
            ]);
            $licArray[$licenseIndex] = [
                'license_name' => $request->license_name,
                'issuing_org' => $request->issuing_org,
                'issued_date' => date("Y-m-d", strtotime($request->issued_date)),
                 'exp_date' => $request->never ? null : (date("Y-m-d", strtotime($request->exp_date))),
                //'exp_date' => $request->exp_date ? date("Y-m-d", strtotime($request->exp_date)) : null,
                'description' => $request->description,
            ];
            $seeker->update(['license' => json_encode($licArray)]);
            return redirect()->route('seeker_profile')->with('success', 'License updated successfully');
        } else {
            return redirect()->route('seeker_profile')->with('error', 'Invalid license index');
        }
    }

    public function profile_license_delete($licenseIndex)
    {
        $seeker = Auth::guard('seeker')->user();
        $licArray = json_decode($seeker->license, true);
        if (is_array($licArray) && array_key_exists($licenseIndex, $licArray)) {
            // Remove the License entry from the array
            unset($licArray[$licenseIndex]);

            // Reindex the array to maintain consecutive keys
            $licArray = array_values($licArray);

            // Update the seeker's license field
            $seeker->update(['license' => json_encode($licArray)]);

            return redirect()->route('seeker_profile')->with('success', 'License deleted successfully');
        } else {
            return redirect()->route('seeker_profile')->with('error', 'Invalid license index');
        }
    }
    // End of License

    // Skills

    public function profile_skills(Request $request)
    {
        $request->validate([
            'skill_name' => 'required',
        ]);

        $newSkill = [
            'skill_name' => $request->skill_name,
        ];

        $seeker = auth('seeker')->user();

        $currentskill = json_decode($seeker->skill, true) ?? [];

        // Ensure $currentskill is an array
        $currentskill = is_array($currentskill) ? $currentskill : [];

        // Add the new Education entry to the existing array of careers
        $currentskill[] = $newSkill;

        $seeker->update(['skill' => json_encode($currentskill)]);

        return redirect()->route('seeker_profile')->with('success', 'Skill Added Successfully');
    }
    public function profile_skills_delete($skillIndex)
    {
        $seeker = Auth::guard('seeker')->user();
        $skillArray = json_decode($seeker->skill, true);
        if (is_array($skillArray) && array_key_exists($skillIndex, $skillArray)) {
            // Remove the skill entry from the array
            unset($skillArray[$skillIndex]);

            // Reindex the array to maintain consecutive keys
            $skillArray = array_values($skillArray);

            // Update the seeker's skill field
            $seeker->update(['skill' => json_encode($skillArray)]);

            return redirect()->route('seeker_profile')->with('success', 'Skill deleted successfully');
        } else {
            return redirect()->route('seeker_profile')->with('error', 'Invalid skill index');
        }
    }
    //End of Skills

    public function profile_languages(Request $request)
    {
        $request->validate([
            'language' => 'required',
        ]);

        $newLang = [
            'language' => $request->language,
        ];

        $seeker = auth('seeker')->user();

        $currentlang = json_decode($seeker->language, true) ?? [];

        // Ensure $currentlang is an array
        $currentlang = is_array($currentlang) ? $currentlang : [];

        // Add the new Education entry to the existing array of careers
        $currentlang[] = $newLang;

        $seeker->update(['language' => json_encode($currentlang)]);

        return redirect()->route('seeker_profile')->with('success', 'Language Added Successfully');
    }
    public function profile_languages_delete($langIndex)
    {
        $seeker = Auth::guard('seeker')->user();
        $langArray = json_decode($seeker->language, true);
        if (is_array($langArray) && array_key_exists($langIndex, $langArray)) {
            // Remove the language entry from the array
            unset($langArray[$langIndex]);

            // Reindex the array to maintain consecutive keys
            $langArray = array_values($langArray);

            // Update the seeker's language field
            $seeker->fill(['language' => json_encode($langArray)])->save();

            return redirect()->route('seeker_profile')->with('success', 'Language deleted successfully');
        } else {
            return redirect()->route('seeker_profile')->with('error', 'Invalid language index');
        }
    }
}
