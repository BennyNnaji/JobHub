@extends('layouts.app')
@section('content')
<div class="container mx-auto">
    @php
        $user = Auth::guard('seeker')->user();
    @endphp
    <div class="bg-gray-400 elevation-10 rounded-t  w-10/12 mx-auto py-5 px-3 my-2">
        <h3 class="text-2xl font-semibold tracking-wide">{{ $user->name }}</h3>
        <a href="mailto:{{ $user->email }}" class="text-sm text-gray-200 my-2 italic block "><i class="fa-regular fa-envelope"></i> {{ $user->email }}</a>
        <a href="tel:{{ $user->phone }}"  class="text-sm text-gray-200 my-2 italic block"> <i class="fa-solid fa-mobile-button"></i> {{ $user->phone }}</a>  
        <p class="text-sm text-gray-200 my-2 italic block"><i class="fa-solid fa-location-dot"></i> Lagos, Nigeria</p>      
    </div>

    <div class="md:flex justify-between mx-auto">
        <div class="md:w-4/6 bg-[#ccc] ">
rer
        </div>
        <div class="md:w-2/6 bg-slate-400">
rr
        </div>

    </div>
 </div>

@endsection