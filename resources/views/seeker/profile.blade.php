@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        @php
            $user = Auth::guard('seeker')->user();
        @endphp

        <div class="bg-gray-400 elevation-10 rounded-t  w-10/12 mx-auto py-5 px-3 my-2">
            <h3 class="text-2xl font-semibold tracking-wide inline">{{ $user->name }}</h3> &nbsp; <span
                class="italic font-thin text-sm">
                @if ($user->gender)
                    {{ $user->gender }}
                @endif
            </span>
            <a href="mailto:{{ $user->email }}" class="text-sm text-gray-200 my-2 italic block w-3/6 "><i
                    class="fa-regular fa-envelope"></i> {{ $user->email }}</a>
            <a href="tel:{{ $user->phone }}" class="text-sm text-gray-200 my-2 italic block w-3/6"> <i
                    class="fa-solid fa-mobile-button"></i> {{ $user->phone }}</a>
            @if ($user->address && $user->state && $user->country)
                <p class="text-sm text-gray-200 my-2 italic block"><i class="fa-solid fa-location-dot"></i>
                    {{ $user->address }}, {{ $user->state }}, {{ $user->country }}</p>
            @endif
            <button class="border-red-500 border-2 cursor-pointer px-5 py-3 rounded hover:border-red-600"><a
                    href="{{ route('seeker_profile_basic') }}">Edit</a></button>
        </div>

        <div class="md:flex justify-between mx-auto md:w-10/12">
            <div class="md:w-4/6">
                <div class="w-">
                    {{-- Summary --}}
                    <div class="elevation-10 p-5 rounded bg-white mb-2 md:w-11/12">
                        @include('seeker.profile.summary')
                    </div>
                </div>
                {{-- Career --}}
                <div class="elevation-10 p-5 rounded bg-white mb-2 md:w-11/12">
                    @include('seeker.profile.career')
                </div>

                {{-- Education --}}
                <div class="elevation-10 p-5 rounded bg-white mb-2 md:w-11/12">
                    @include('seeker.profile.education')
                </div>

                {{-- Liecense --}}

                <div class="elevation-10 p-5 rounded bg-white mb-2 md:w-11/12">
                    @include('seeker.profile.license')
                </div>

                {{-- Skills --}}

                <div class="elevation-10 p-5 rounded bg-white mb-2 md:w-11/12">
                    @include('seeker.profile.skills')
                </div>

                {{-- language --}}
                <div class="elevation-10 p-5 rounded bg-white mb-2 md:w-11/12">
                    @include('seeker.profile.language')
                </div>
            </div>
        </div>
        <div class="md:w-2/6 bg-slate-400 p-3">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur harum temporibus officiis nisi illo?
            Perferendis quis voluptas vel exercitationem voluptatem sunt libero veniam magni ea accusamus architecto
            error. Numquam sunt expedita ex consectetur, dolorem sequi deserunt labore totam hic temporibus quibusdam
            pariatur cumque unde accusamus provident rem. Praesentium maiores cum aperiam quia delectus molestias
            incidunt molestiae.
            <div x-data="{ open: false }">
                <button x-on:click="open = true"
                    class="rounded-lg bg-blue-50 px-5 py-2.5 text-sm font-medium text-blue-500 hover:bg-blue-100 hover:text-blue-600">Show
                    Modal</button>

                <div x-show="open" @click.away="open = false">
                    <!-- Your modal content goes here -->
                    Modal content here. Click outside to close.
                </div>
            </div>

        </div>

    </div>
    </div>
    <!-- JavaScript for Modals -->
<script>
        // // Delete Confirmation
        // function confirmDelete(index) {
        //     Swal.fire({
        //         title: "Are you sure?",
        //         text: "This is irreversible!",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#d33",
        //         cancelButtonColor: "#3085d6",
        //         confirmButtonText: "Yes, delete it!"
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             // If confirmed, submit the form
        //             document.getElementById('deleteForm' + index).submit();
        //         } else {
        //             // If canceled, show a message (optional)
        //             Swal.fire("Canceled", "Your entry was not deleted", "info");
        //         }
        //     });
        // }
</script>
@endsection
