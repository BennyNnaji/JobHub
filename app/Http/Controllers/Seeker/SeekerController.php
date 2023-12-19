<?php

namespace App\Http\Controllers\Seeker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SeekerController extends Controller
{
    public function seeker_profile(){
        $title = 'My Profile';
        return view('seeker.profile', compact('title'));
       
    }

}
