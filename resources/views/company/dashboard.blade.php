@extends('company.layout.app')
@section('content')
    
Welcome to company dashboard!!! <br>
{{-- @php
$company = Auth::guard('company')->user();
@endphp
@if (
$company->logo == '' || 
$company->description == '' || 
$company->website == '' || 
$company->address == '' || 
$company->phone == '' 
)


    {{ $company->name }} please update your profile. <br> 
    <a href="//" class="text-blue-600 ml-3 ">Update</a>
@else
    {{ $company->email }} welcome. <br> 

@endif
    --}}



@endsection