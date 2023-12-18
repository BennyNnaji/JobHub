<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeekerController extends Controller
{
    public function seeker_dashboard(){
        return view('seeker.dashboard');
    }

}
