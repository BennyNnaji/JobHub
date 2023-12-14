

@extends('company.layout.app')
@section('content')
    
       <div class="w-full rounded-t-2xl bg-gray-400 text-gray-200 font-semibold text-3xl px-4 flex justify-between mb-2">
            <div>
                Dashboard
            </div>
            <div class="w-2/12 md:w-auto">
                <a href="{{ url()->previous() }}"><img src="{{ asset('images/front/back.png') }}" alt="icon"
                        class="w-full"></a>
            </div>
        </div>



<section>
    <div class="grid sm:grid-cols-2 md:grid-cols-4 w-full gap-5 space-y-5 sm:space-y-0">
        <div class="px-10 py-5 elevation-10 bg-gray-400 rounded-b flex justify-between items-center">
            <div class="rounded-full bg-gray-300 w-2/6">
                <img src="https://img.icons8.com/?size=80&id=g9JTFVPFhtkc&format=png" alt="" class="w-full rounded-full">
            </div>
            <div class="text-gray-300">
                <p class="text-center font-bold">Jobs Posted</p>
                <p class="text-center text-6xl">{{ count($jobs) }}</p>
            </div>        
        </div>
        <div class="px-10 py-5 elevation-10 bg-gray-400 rounded-b flex justify-between items-center">
            <div class="rounded-full bg-gray-300 w-2/6">
                <img src="https://img.icons8.com/?size=80&id=hH1yYj2eECWj&format=png" alt="" class="w-full rounded-full">
            </div>
            <div class="text-gray-300">
                <p class="text-center font-bold">Jobs Approved</p>
                <p class="text-center text-6xl">0</p>
            </div>
        </div>
        <div class="px-10 py-5 elevation-10 bg-gray-400 rounded-b flex justify-between items-center">
            <div class="rounded-full bg-gray-300 w-2/6">
                <img src="https://img.icons8.com/?size=100&id=WbwGa2LgO2kI&format=png" alt="" class="w-full rounded-full">
            </div>
            <div class="text-gray-300">
                <p class="text-center font-bold">Accepted Applicaions</p>
                <p class="text-center text-6xl">0</p>
            </div>
        </div>
     
        <div class="px-10 py-5 elevation-10 bg-gray-400 rounded-b flex justify-between items-center">
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