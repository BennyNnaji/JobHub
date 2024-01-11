<!-- resources/views/errors/404.blade.php -->
@extends('layouts.app')  {{-- Use your own layout if applicable --}}
@section('content')
@php
    $title = "Page Not Found";
@endphp
    <div class="container flex items-center  h-screen">
        <div class="w-4/5 mx-auto text-center">
            <h5 class="text-9xl capitalize text-black"> Page not found</h5>
        </div>
    </div>
@endsection
