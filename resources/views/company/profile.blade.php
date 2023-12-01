@extends('company.layout.app')
@section('content')
<section>
        @php
$company = Auth::guard('company')->user();
@endphp
    <div class="w-full rounded-t-2xl bg-gray-400 text-gray-200 font-semibold text-3xl p-4">
        Profile Details
    </div>
    <div class="w-full">
        <div class="relative mb-48 ">
            <div class="relative border-b-2 border-red-500 ">
               <div class="w-full h-['60px']">
                 <img src="https://dummyimage.com/1200x600/ccc/fff" alt="" class="w-full object-cover">
               </div>
                <div class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 border-2 border-red-500/70 w-56 h-56  mx-auto rounded-full">
                    <img src="https://dummyimage.com/150x150/ccc/fff" alt="" class="w-full rounded-full">
                   <p class="text-3xl font-bold text-gray-500 text-center">{{ $company->name }}</p>
                </div>

            </div>
        </div>

<div class="w-full">

</div>
    </div>
</section>
    
@endsection