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

                    {{-- Career --}}
                    <div class="elevation-10 p-5 rounded bg-white mb-2 md:w-11/12">
                        <h2 class="text-lg text-gray-400">Edit Career</h2>
               
                        <button
                        class="bg-green-500 text-white px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center"
                        onclick="openCareer()"> <i class="fa-solid fa-plus"></i></button>
                 
                        <div id="career"
                            class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 z-50 rounded"
                            onclick="closeCareer()">
                            <div class="bg-white p-8 rounded shadow-lg w-4/5 md:w-3/5" onclick="event.stopPropagation()">
                                <h3 class="mb-2 text-2xl font-bold text-gray-800">Update Career</h3>

                                <!-- Form -->
                                <div class="w-full ">
                                    <form
                                        action="{{route('profile_career_update', ['careerIndex' => $careerIndex]) }}"
                                        method="post">
                                        @method('put')
                                        @csrf
                                        <label for="position" class="block text-left">Position</label>
                                        <input type="text" name="position" id="position" class="rounded p-3 w-full"
                                            value="{{ $career['position']}}">
                                        @error('position')
                                            <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                                                {{ $message }}</div>
                                        @enderror

                                        <label for="company" class="block text-left">Company</label>
                                        <input type="text" name="company" id="company" class="rounded p-3 w-full"
                                            value="{{ $career['company'] }}">
                                        @error('company')
                                            <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                                                {{ $message }}</div>
                                        @enderror

                                        <div class="flex w-full gap-x-9">
                                            <div id="fromDate">
                                                <label for="from" class="block text-left">Start</label>
                                                <input type="date" name="from" id="from"
                                                    class="rounded p-3 w-full"
                                                    value="{{ $career['from'] }}">
                                                @error('from')
                                                    <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div id="toDate">
                                                <label for="to" class="block text-left">End</label>
                                                <input type="date" name="to" id="to"
                                                    value="{{ $career['to'] }}"
                                                    class="rounded p-3 w-full">
                                                @error('to')
                                                    <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="py-3">
                                                <label for="current"> Currently Working</label>
                                                <input type="checkbox" name="current" id="current">
                                            </div>

                                        </div>
                                        <label for="description" class="block text-left">Description <span
                                                class="text-xs italic">(Optional)</span></label>
                                        <textarea name="description" id="description" class="rounded p-3 w-full"> {{ $career['description'] }}</textarea>
                                        @error('description')
                                            <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                                                {{ $message }}</div>
                                        @enderror
                                        <div class="flex justify-between my-3">
                                            <button type="submit"
                                                class="bg-green-500 hover:bg-green-600 px-5 py-3 rounded focus:ring-green-600 text-green-200 hover:text-green-300">Update 
                                                Career</button>
                                            <p class="cursor-pointer bg-red-500 hover:bg-red-600 text-red-200 hover:text-red-300 px-5 py-3 rounded"
                                                onclick="closeCareer()">Close</p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- /Modal Content --}}
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
        const toDate = document.getElementById('toDate');
        const current = document.getElementById('current');
        const fromDate = document.getElementById('fromDate');

        current.addEventListener('change', function() {
            if (current.checked) {
                toDate.classList.add('hidden');
                toDate.value = 'null';
                fromDate.classList.add('w-full');
            } else {
                toDate.classList.remove('hidden');
                fromDate.classList.remove('w-full');
            }
        });
    
        // Career
        function openCareer() {
            document.getElementById('career').classList.remove('hidden');
        }

        function closeCareer() {
            document.getElementById('career').classList.add('hidden');
        }

    </script>
    <script>
        function toggleExpiryDate() {
            var expDateInput = document.getElementById('exp_date');
            var neverExpCheckbox = document.getElementById('never_exp');

            if (neverExpCheckbox.checked) {
                expDateInput.classList.add('hidden');
            } else {
                expDateInput.classList.remove('hidden');
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the 'from' and 'to' elements
            let from = document.getElementById('from');
            let to = document.getElementById('to');
            let today = new Date();
            from.max = today.toISOString().split('T')[0];

            // Attach an event listener to 'from' input
            from.addEventListener('change', function() {
                // Set the 'min' attribute of 'to' input to the selected 'from' date

                to.min = from.value;
                to.max = today.toISOString().split('T')[0];

                // If 'to' date is already selected and is before the new 'min' date, clear its value
                if (to.value && to.value < from.value) {
                    to.value = '';
                }
            });
        });
    </script>

@endsection
