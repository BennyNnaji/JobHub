<?php

namespace App\Http\Controllers\Seeker\Auth;

use App\Models\Seeker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SeekerAuthController extends Controller
{
    protected $guard = 'seeker';

    public function seeker_login()
    {
        if (Auth::guard('seeker')->check()) {
            return redirect()->route('seeker_profile');
        }else{
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

    public function seeker_login_post(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::guard('seeker')->attempt($credentials)) {
            // Authentication passed for seeker
            return redirect()->route('index')->with('success', 'Login successful');
        }

        // Authentication failed for seeker
        return back()->withErrors(['email' => 'Invalid credentials', 'password' => 'Invalid credentials'])->withInput($request->only('email'));
    }
    public function seeker_logout(){
        Auth::guard('seeker')->logout();
        return redirect()->route('seeker_login')->with('success', 'Logout Successful');
    }
}
