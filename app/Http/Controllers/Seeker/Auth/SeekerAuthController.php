<?php

namespace App\Http\Controllers\Seeker\Auth;

use App\Models\Seeker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SeekerAuthController extends Controller
{
    protected $guard = 'seeker';

    public function seeker_login()
    {
        if (Auth::guard('seeker')->check()) {
            if (Auth::guard('seeker')->user()->status != 1) {
                return view('seeker.login')->with('error', 'Account Not Active');
            } else {
                return redirect()->route('seeker_profile');
            }
        } else {
            return view('seeker.login');
        }
    }

    public function seeker_register()
    {
        if (Auth::guard('seeker')->check()) {
            return redirect()->route('seeker_profile');
        } else {
            return view('seeker.register');
        }
    }
    public function seeker_reg_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email |unique:seekers',
            'phone' => 'required',
            'password' => 'required|confirmed|min:8',

        ]);
        // Seeker::create($request->all());
        $seeker = Seeker::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
        ]);
        return redirect()->route('seeker_login')->with('success', 'Registration Successful, Please login');
    }


    public function seeker_login_reset()
    {
        if (Auth::guard('seeker')->check()) {
            return redirect()->route('seeker_profile');
        } else {
            return view('seeker.reset');
        }
    }

    public function seeker_login_post(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('seeker')->attempt($credentials)) {
            // Authentication passed for seeker
            return redirect()->route('index')->with('success', 'Login successful');
        }

        // Authentication failed for seeker
        return back()->withErrors(['email' => 'Invalid credentials', 'password' => 'Invalid credentials'])->withInput($request->only('email'));
    }
    public function seeker_logout()
    {
        Auth::guard('seeker')->logout();
        return redirect()->route('seeker_login')->with('success', 'Logout Successful');
    }

    // password reset
    public function password_reset()
    {
        $seeker = Auth::guard('seeker')->user();
        $title = 'Update Password';
        return view('seeker.update_password', compact('seeker', 'title'));
    }

    // password reset Update
    public function password_update(Request $request)
    {
        $request->validate([
            'old_password' => 'required|',
            'password' => 'required|confirmed|min:8',
        ]);
        $seeker = Auth::guard('seeker')->user();
        // Check if the old password matches the one in the database
        if (!Hash::check($request->old_password, $seeker->password)) {
        //     return redirect()->back()->with('error', 'The old password is incorrect.');
        // }
        // if (!bcrypt($request->old_password != $seeker->password)) {
            return redirect()->back()->with('error', 'The old password is incorrect.');
        } else {
            $seeker->update([
                'password' => bcrypt($request->password),
            ]);
            return redirect()->route('seeker_profile')->with('success', 'Password Updated Successfully');
        }

        // Update the password
        // $user->update([
        //     'password' => Hash::make($request->password),
        // ]);



    }
}
