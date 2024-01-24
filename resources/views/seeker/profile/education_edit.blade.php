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
                    {{-- Education --}}
                    <div class="elevation-10 p-5 rounded bg-white mb-2 md:w-11/12">
                        <h2 class="text-lg text-gray-400">Edit Education</h2>

                        <button
                            class="bg-green-500 text-white px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center"
                            onclick="openEducation()"> <i class="fa-solid fa-plus"></i></button>

                        <div id="education"
                            class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 z-50 rounded"
                            onclick="closeEducation()">
                            <div class="bg-white p-8 rounded shadow-lg w-4/5 md:w-3/5" onclick="event.stopPropagation()">
                                <h3 class="mb-2 text-2xl font-bold text-gray-800">Update Education</h3>

                                <!-- Form -->
                                <div class="w-full ">
                                    <form action="{{ route('profile_education_update', ['eduIndex' =>$eduIndex]) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <label for="institution" class="block text-left">Institution</label>
                                        <input type="text" name="institution" id="institution"
                                            value="{{ $education['institution'] }}" class="rounded p-3 w-full ">
                                        @error('institution')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror

                                        <label for="qualification" class="block text-left">Qualification/Course</label>
                                        <input type="text" name="qualification" id="qualification"
                                            class="rounded p-3 w-full " value="{{ $education['qualification'] }}">
                                        @error('qualification')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror




                                        <label for="grad_year" class="block text-left">Graduation Year</label>
                                        <input type="date" name="grad_year" id="grad_year" class="rounded p-3 w-full" value="{{ $education['grad_year'] }}">
                                        @error('record')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror




                                        <label for="edu_description" class="block text-left">Description <span
                                                class="text-xs italic">(Optional)</span>

                                        </label>
                                        <small>Add activities, projects, awards or achievements during your study.</small>
                                        <textarea name="edu_description" id="edu_description" class="rounded p-3 w-full">{{ $education['edu_description'] }}</textarea>
                                        <div class="flex justify-between my-3">
                                            <button type="submit"
                                                class="bg-green-500 hover:bg-green-600 px-5 py-3 rounded focus:ring-green-600 text-green-200 hover:text-green-300">Add
                                                Education</button>
                                            <p class="cursor-pointer bg-red-500 hover:bg-red-600 text-red-200 hover:text-red-300 px-5 py-3 rounded"
                                                onclick="closeEducation()">Close</p>
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
                        <script>
                            // Education
                            function openEducation() {
                                document.getElementById('education').classList.remove('hidden');
                            }

                            function closeEducation() {
                                document.getElementById('education').classList.add('hidden');
                            }
                        </script>
                    @endsection
