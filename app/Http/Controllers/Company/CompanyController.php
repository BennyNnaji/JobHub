<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    // Show admin login form
    public function showLoginForm()
    {
        return view('company.login');
    }

    // Handle admin login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('company')->attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/company/dashboard');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Handle admin logout
    public function logout()
    {
        Auth::guard('company')->logout();
        return redirect('/company/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
