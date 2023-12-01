

@extends('company.layout.app')
@section('content')
    
<h2 class="font-semibold text-4xl">Dashboard</h2 <br>
    @php
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
<section>
    <div class="grid sm:grid-cols-2 md:grid-cols-4 w-full gap-5 space-y-5 sm:space-y-0">
        <div class="px-10 py-5 elevation-10 bg-gray-400 rounded flex justify-between items-center">
            <div class="rounded-full bg-gray-300 w-2/6">
                <img src="https://img.icons8.com/?size=80&id=g9JTFVPFhtkc&format=png" alt="" class="w-full rounded-full">
            </div>
            <div class="text-gray-300">
                <p class="text-center font-bold">Jobs Posted</p>
                <p class="text-center text-6xl">0</p>
            </div>        
        </div>
        <div class="px-10 py-5 elevation-10 bg-gray-400 rounded flex justify-between items-center">
            <div class="rounded-full bg-gray-300 w-2/6">
                <img src="https://img.icons8.com/?size=80&id=hH1yYj2eECWj&format=png" alt="" class="w-full rounded-full">
            </div>
            <div class="text-gray-300">
                <p class="text-center font-bold">Jobs Approved</p>
                <p class="text-center text-6xl">0</p>
            </div>
        </div>
        <div class="px-10 py-5 elevation-10 bg-gray-400 rounded flex justify-between items-center">
            <div class="rounded-full bg-gray-300 w-2/6">
                <img src="https://img.icons8.com/?size=100&id=WbwGa2LgO2kI&format=png" alt="" class="w-full rounded-full">
            </div>
            <div class="text-gray-300">
                <p class="text-center font-bold">Accepted Applicaions</p>
                <p class="text-center text-6xl">0</p>
            </div>
        </div>
     
        <div class="px-10 py-5 elevation-10 bg-gray-400 rounded flex justify-between items-center">
            <div class="rounded-full bg-gray-300 w-2/6">
                <img src="https://img.icons8.com/?size=100&id=NY0ryT2CNe4U&format=png" alt="" class="w-full rounded-full">
            </div>
                <div class="text-gray-300">
                    <p class="text-center font-bold">Declined Applications</p>
                    <p class="text-center text-6xl">0</p>
            </div>
        </div>

                    

    </div>
</section>


   



@endsection