<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontpageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }
    public function seeker_register()
    {
        return view('seeker.register');
    }

    public function seeker_login()
    {
        return view('seeker.login');
    }
    public function company_register()
    {
        return view('company.register');
    }
    public function company_login()
    {
        return view('company.login');
    }
    public function company_login_reset()
    {
        return view('company.reset');
    }
    public function seeker_login_reset()
    {
        return view('seeker.reset');
    }
   
     
         
     
        // if(!session()->has('seeker_id') && !session()->has('company_id')){
        //     return redirect('/');
        // }
        // if(session()->has('seeker_id')){
        //     return redirect('/seeker/dashboard');
        // }elseif(session()->has('company_id')){
        //     return redirect('/company/dashboard');
        // }else{
        //     return redirect('/');
        // }

    
 
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
