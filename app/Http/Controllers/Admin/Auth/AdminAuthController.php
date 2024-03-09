<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    protected $guard = 'admin';
    public function admin_login(){
        $title = 'Admin Login';
        if (Auth::guard('admin')->check()) {

            return redirect()->route('admin_dashboard');
        }
        return view('admin.auth.login', compact('title'));
    }

    public function admin_login_post(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin_dashboard');
        }
        return redirect()->back()->withErrors(['username' => 'Invalid credentials', 'password' => 'Invalid credentials'])->withInput($request->only('username'));
    }


}
