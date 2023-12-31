@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        @php
            $user = Auth::guard('seeker')->user();
        @endphp
        <div class="bg-gray-400 elevation-10 rounded-t  w-10/12 mx-auto py-5 px-3 my-2">
            <h3 class="text-2xl font-semibold tracking-wide">{{ $user->name }}</h3>
            <a href="mailto:{{ $user->email }}" class="text-sm text-gray-200 my-2 italic block "><i
                    class="fa-regular fa-envelope"></i> {{ $user->email }}</a>
            <a href="tel:{{ $user->phone }}" class="text-sm text-gray-200 my-2 italic block"> <i
                    class="fa-solid fa-mobile-button"></i> {{ $user->phone }}</a>
            <p class="text-sm text-gray-200 my-2 italic block"><i class="fa-solid fa-location-dot"></i> Lagos, Nigeria</p>
        </div>

        <div class="md:flex justify-between mx-auto md:w-10/12">
            <div class="md:w-4/6">
                <div class="w-">
                    <div class="elevation-10 p-5 rounded bg-white mb-2 md:w-11/12">
                        <h2 class="text-lg text-gray-400">Profile Summary</h2>
                        <p class="font-medium break-words leading-normal pt-2 border-2 border-gray-300 p-2 rounded-lg ">
                            {!! nl2br($user->summary) !!}
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt minus sed dolorem beatae
                            adipisci,
                            accusantium sint autem nisi, sit dolorum perferendis officia libero tenetur enim, nulla dolor
                            quas est doloribus.
                        </p>


                    </div>
                    {{-- Career --}}
                    <div class="elevation-10 p-5 rounded bg-white mb-2 md:w-11/12">
                        <h2 class="text-lg text-gray-400">Career History</h2>
                        <p class="font-medium break-words leading-normal pt-2 border-2 border-gray-300 p-2 rounded-lg ">
                            {!! nl2br($user->summary) !!}
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt minus sed dolorem beatae
                            adipisci,
                            accusantium sint autem nisi, sit dolorum perferendis officia libero tenetur enim, nulla dolor
                            quas est doloribus.
                        </p>
                        {{-- Modal Trigger Button --}}
                        <button
                            class="bg-green-500 text-white px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center my-2"
                            onclick="openCareer()"> <i class="fa-solid fa-plus"></i></button>

                        <!-- Centered Modal -->
                        <div id="career"
                            class="fixed inset-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50 z-50 rounded"
                            onclick="closeCareer()">
                            <div class="bg-white p-8 rounded shadow-lg" onclick="event.stopPropagation()">
                                <h3 class="mb-2 text-2xl font-bold text-gray-800">Add Career</h3>

                                <!-- Form -->
                                <div class="w-full ">
                                    <form action="" method="post">
                                        <label for="position" class="block text-left">Position</label>
                                        <input type="text" name="position" id="position" class="rounded p-3 w-full ">

                                        <label for="compqny" class="block text-left">Company</label>
                                        <input type="text" name="compqny" id="compqny" class="rounded p-3 w-full ">

                                        <div class="flex w-full gap-x-9">
                                            <div>
                                                <label for="start_month" class="block text-left">Start</label>
                                                <input type="month" name="start_month" id="start_month"
                                                    class="rounded p-3 w-full">
                                            </div>
                                            <div>
                                                <label for="end_month" class="block text-left">End</label>
                                                <input type="month" name="end_month" id="end_month"
                                                    class="rounded p-3 w-full">
                                            </div>
                                        </div>

                                        <label for="description" class="block text-left">Description <span
                                                class="text-xs italic">(Optional)</span></label>
                                        <textarea name="description" id="description" class="rounded p-3 w-full"></textarea>
                                        <div class="flex justify-between my-3">
                                            <button type="submit"
                                                class="bg-green-500 hover:bg-green-600 px-5 py-3 rounded focus:ring-green-600 text-green-200 hover:text-green-300">Add
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

                    {{-- Education --}}
                    <div class="elevation-10 p-5 rounded bg-white mb-2 md:w-11/12">
                        <h2 class="text-lg text-gray-400">Education History</h2>
                        <p class="font-medium break-words leading-normal pt-2 border-2 border-gray-300 p-2 rounded-lg ">
                            {!! nl2br($user->summary) !!}
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt minus sed dolorem beatae
                            adipisci,
                            accusantium sint autem nisi, sit dolorum perferendis officia libero tenetur enim, nulla dolor
                            quas est doloribus.
                        </p>
                        {{-- Modal Trigger Button --}}
                        <button
                            class="bg-green-500 text-white px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center my-2"
                            onclick="openEducation()"> <i class="fa-solid fa-plus"></i></button>

                        <!-- Centered Modal -->
                        <div id="education"
                            class="fixed inset-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50 z-50 rounded"
                            onclick="closeEducation()">
                            <div class="bg-white p-8 rounded shadow-lg" onclick="event.stopPropagation()">
                                <h3 class="mb-2 text-2xl font-bold text-gray-800">Add Education</h3>

                                <!-- Form -->
                                <div class="w-full ">
                                    <form action="" method="post">
                                        <label for="institution" class="block text-left">Institution</label>
                                        <input type="text" name="institution" id="institution"
                                            value="{{ old('institution') }}" class="rounded p-3 w-full ">
                                        @error('institution')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror

                                        <label for="qualification" class="block text-left">Qualification/Course</label>
                                        <input type="text" name="qualification" id="qualification"
                                            class="rounded p-3 w-full ">
                                        @error('qualification')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror




                                        <label for="grad_year" class="block text-left">Graduation Year</label>
                                        <input type="month" name="grad_year" id="grad_year"
                                            class="rounded p-3 w-full">
                                        @error('record')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror




                                        <label for="edu_description" class="block text-left">Description <span
                                                class="text-xs italic">(Optional)</span>

                                        </label>
                                        <small>Add activities, projects, awards or achievements during your study.</small>
                                        <textarea name="edu_description" id="edu_description" class="rounded p-3 w-full">{{ old('edu_description') }}</textarea>
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

                    {{-- Liecense --}}

                    <div class="elevation-10 p-5 rounded bg-white mb-2 md:w-11/12">
                        <h2 class="text-lg text-gray-400">Licences</h2>
                        <p class="font-medium break-words leading-normal pt-2 border-2 border-gray-300 p-2 rounded-lg ">
                            {!! nl2br($user->summary) !!}
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt minus sed dolorem beatae
                            adipisci,
                            accusantium sint autem nisi, sit dolorum perferendis officia libero tenetur enim, nulla dolor
                            quas est doloribus.
                        </p>
                        {{-- Modal Trigger Button --}}
                        <button
                            class="bg-green-500 text-white px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center my-2"
                            onclick="openLicence()"> <i class="fa-solid fa-plus"></i></button>

                        <!-- Centered Modal -->
                        <div id="licence"
                            class="fixed inset-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50 z-50 rounded w-full"
                            onclick="closeLicence()">
                            <div class="bg-white p-8 rounded shadow-lg" onclick="event.stopPropagation()">
                                <h3 class="mb-2 text-2xl font-bold text-gray-800">Add Licence</h3>

                                <!-- Form -->
                                <div class="w-full ">
                                    <form action="" method="post">
                                        <label for="licence_name" class="block text-left">Licence Name</label>
                                        <input type="text" name="licence_name" id="licence_name"
                                            class="rounded p-3 w-full ">

                                        <label for="issuing_org" class="block text-left">Issuing Organization</label>
                                        <input type="text" name="issuing_org" id="issuing_org"
                                            class="rounded p-3 w-full ">



                                        <label for="issued_date" class="block text-left">Date Issued</label>
                                        <input type="month" name="issued_date" id="issued_date"
                                            class="rounded p-3 w-full">

                                        
                                            <label for="exp_date" class="block text-left" id="exp_date">Expiry Date
                                            <input type="month" name="exp_date" 
                                                class="rounded p-3 w-full">
                                    </label>
                                      

                                        <input type="checkbox" name="never" id="never_exp"
                                            onchange="toggleExpiryDate()">
                                        <label for="never_exp">Doesn't Expire</label>

                                        <label for="description" class="block text-left">Description <span
                                                class="text-xs italic">(Optional)</span></label>
                                                <small>Briefly describe this credential – you can also add a type or URL if applicable.</small>
                                        <textarea name="description" id="description" class="rounded p-3 w-full"></textarea>
                                        <div class="flex justify-between my-3">
                                            <button type="submit"
                                                class="bg-green-500 hover:bg-green-600 px-5 py-3 rounded focus:ring-green-600 text-green-200 hover:text-green-300">Add
                                                Career</button>
                                            <p class="cursor-pointer bg-red-500 hover:bg-red-600 text-red-200 hover:text-red-300 px-5 py-3 rounded"
                                                onclick="closeLicence()">Close</p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- /Modal Content --}}



                    </div>

                    {{-- Skills --}}

                    <div class="elevation-10 p-5 rounded bg-white mb-2 md:w-11/12">
                        <h2 class="text-lg text-gray-400">Skills</h2>
                        <p class="font-medium break-words leading-normal pt-2 border-2 border-gray-300 p-2 rounded-lg ">
                            {!! nl2br($user->summary) !!}
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt minus sed dolorem beatae
                            adipisci,
                            accusantium sint autem nisi, sit dolorum perferendis officia libero tenetur enim, nulla dolor
                            quas est doloribus.
                        </p>
                        {{-- Modal Trigger Button --}}
                        <button
                            class="bg-green-500 text-white px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center my-2"
                            onclick="openSkill()"> <i class="fa-solid fa-plus"></i></button>

                        <!-- Centered Modal -->
                        <div id="skill"
                            class="fixed inset-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50 z-50 rounded"
                            onclick="closeSkill()">
                            <div class="bg-white p-8 rounded shadow-lg" onclick="event.stopPropagation()">
                                <h3 class="mb-2 text-2xl font-bold text-gray-800">Add Skill</h3>

                                <!-- Form -->
                                <div class="w-full ">
                                    <form action="" method="post">
                                        <label for="position" class="block text-left">Position</label>
                                        <input type="text" name="position" id="position"
                                            class="rounded p-3 w-full ">

                                        <label for="compqny" class="block text-left">Company</label>
                                        <input type="text" name="compqny" id="compqny" class="rounded p-3 w-full ">

                                        <div class="flex w-full gap-x-9">
                                            <div>
                                                <label for="start_month" class="block text-left">Start</label>
                                                <input type="month" name="start_month" id="start_month"
                                                    class="rounded p-3 w-full">
                                            </div>
                                            <div>
                                                <label for="end_month" class="block text-left">End</label>
                                                <input type="month" name="end_month" id="end_month"
                                                    class="rounded p-3 w-full">
                                            </div>
                                        </div>

                                        <label for="description" class="block text-left">Description <span
                                                class="text-xs italic">(Optional)</span></label>
                                        <textarea name="description" id="description" class="rounded p-3 w-full"></textarea>
                                        <div class="flex justify-between my-3">
                                            <button type="submit"
                                                class="bg-green-500 hover:bg-green-600 px-5 py-3 rounded focus:ring-green-600 text-green-200 hover:text-green-300">Add
                                                Career</button>
                                            <p class="cursor-pointer bg-red-500 hover:bg-red-600 text-red-200 hover:text-red-300 px-5 py-3 rounded"
                                                onclick="closeSkill()">Close</p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- /Modal Content --}}



                    </div>

                    {{-- language --}}
                    <div class="elevation-10 p-5 rounded bg-white mb-2 md:w-11/12">
                        <h2 class="text-lg text-gray-400">Languages</h2>
                        <p class="font-medium break-words leading-normal pt-2 border-2 border-gray-300 p-2 rounded-lg ">
                            {!! nl2br($user->summary) !!}
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt minus sed dolorem beatae
                            adipisci,
                            accusantium sint autem nisi, sit dolorum perferendis officia libero tenetur enim, nulla dolor
                            quas est doloribus.
                        </p>
                        {{-- Modal Trigger Button --}}
                        <button
                            class="bg-green-500 text-white px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center my-2"
                            onclick="openLanguage()"> <i class="fa-solid fa-plus"></i></button>

                        <!-- Centered Modal -->
                        <div id="language"
                            class="fixed inset-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50 z-50 rounded"
                            onclick="closeLanguage()">
                            <div class="bg-white p-8 rounded shadow-lg" onclick="event.stopPropagation()">
                                <h3 class="mb-2 text-2xl font-bold text-gray-800">Add Language</h3>

                                <!-- Form -->
                                <div class="w-full ">
                                    <form action="" method="post">
                                        <label for="position" class="block text-left">Position</label>
                                        <input type="text" name="position" id="position"
                                            class="rounded p-3 w-full ">

                                        <label for="compqny" class="block text-left">Company</label>
                                        <input type="text" name="compqny" id="compqny" class="rounded p-3 w-full ">

                                        <div class="flex w-full gap-x-9">
                                            <div>
                                                <label for="start_month" class="block text-left">Start</label>
                                                <input type="month" name="start_month" id="start_month"
                                                    class="rounded p-3 w-full">
                                            </div>
                                            <div>
                                                <label for="end_month" class="block text-left">End</label>
                                                <input type="month" name="end_month" id="end_month"
                                                    class="rounded p-3 w-full">
                                            </div>
                                        </div>

                                        <label for="description" class="block text-left">Description <span
                                                class="text-xs italic">(Optional)</span></label>
                                        <textarea name="description" id="description" class="rounded p-3 w-full"></textarea>
                                        <div class="flex justify-between my-3">
                                            <button type="submit"
                                                class="bg-green-500 hover:bg-green-600 px-5 py-3 rounded focus:ring-green-600 text-green-200 hover:text-green-300">Add
                                                Language</button>
                                            <p class="cursor-pointer bg-red-500 hover:bg-red-600 text-red-200 hover:text-red-300 px-5 py-3 rounded"
                                                onclick="closeLanguage()">Close</p>
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
        // Career
        function openCareer() {
            document.getElementById('career').classList.remove('hidden');
        }

        function closeCareer() {
            document.getElementById('career').classList.add('hidden');
        }

        // Education
        function openEducation() {
            document.getElementById('education').classList.remove('hidden');
        }

        function closeEducation() {
            document.getElementById('education').classList.add('hidden');
        }
        // Licence
        function openLicence() {
            document.getElementById('licence').classList.remove('hidden');
        }

        function closeLicence() {
            document.getElementById('licence').classList.add('hidden');
        }
        // Skill
        function openSkill() {
            document.getElementById('skill').classList.remove('hidden');
        }

        function closeSkill() {
            document.getElementById('skill').classList.add('hidden');
        }

        // Language
        function openLanguage() {
            document.getElementById('language').classList.remove('hidden');
        }

        function closeLanguage() {
            document.getElementById('language').classList.add('hidden');
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
@endsection
