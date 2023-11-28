<?php

namespace App\Http\Controllers\Company\Auth;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Hash;

class CompanyAuthController extends Controller
{
    protected $guard = 'company';

    public function company_register()
    {
        return view('company.register');
    }
    public function company_store(Request $request)
    {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed|min:8',
                'phone' => 'required',
            ]);

            $company = Company::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'website' => $request->website,
            ]);

            return redirect()->route('company_login');
  
    }
    public function company_login()
    {
        return view('company.login');
    }
    public function company_login_post(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('company')->attempt($credentials)) {
            // Authentication passed for admin
            return redirect()->route('company_dashboard')->with('success', 'Login successful');
        }

        // Authentication failed for admin
        return back()->withErrors(['email' => 'Invalid credentials', 'password' => 'Invalid credentials'])->withInput($request->only('email'));
    }

    public function company_dashboard(){
        return view('company.dashboard');
    }
    

}
