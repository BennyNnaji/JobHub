@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        @php
            $user = Auth::guard('seeker')->user();
        @endphp

        <div class="  md:w-[86%] mx-auto">
            <h3 class="bg-red-600 text-red-200 px-2 py-3 rounded-tl-lg rounded-br-lg"> Profile Update</h3>
            <div class="md-5/6 mx-auto py-3 px-2 elevation-10 my-1">
                <form action="{{ route('seeker_profile_basic_update', $seeker->id) }}" method="post">
                    @method('Update')
                    @csrf
                    <div class="md:flex">
                        <div class=" md:w-3/6 mx-1">
                            <label for="name" class="block font-semibold">Name:</label>
                            <input type="text" readonly name="name" id="name"
                                class="text-input rounded focus:border-0 cursor-not-allowed w-full  focus:ring-0 "
                                value="{{ $seeker->name }}">
                        </div>
                        <div class=" md:w-3/6 mx-1">
                            <label for="email" class="block font-semibold">Email:</label>
                            <input type="email" readonly name="email" id="email"
                                class="text-input rounded focus:border-0 cursor-not-allowed w-full  focus:ring-0 "
                                value="{{ $seeker->email }}">
                        </div>

                    </div>

                    <div class="md:flex">
                        <div class=" md:w-3/6 mx-1">
                            <label for="phone" class="block font-semibold">Phone:</label>
                            <input type="tel" name="phone" id="phone"
                                class="text-input rounded focus:border-0 w-full  focus:ring-0 "
                                value="{{ $seeker->phone }}">
                        </div>
                        <div class=" md:w-3/6 mx-1">
                            <label for="birthday" class="block font-semibold">Email:</label>
                            <input type="date" name="birthday" id="birthday"
                                class="text-input rounded focus:border-0 w-full  focus:ring-0 "
                                value="{{ $seeker->birthday }}">
                        </div>


                    </div>
                    <div class="md:flex">
                        <div class=" md:w-3/6 mx-1">
                            <label for="gender" class="block font-semibold">Gender:</label>
                            <select name="gender" id="gender" class="text-input rounded focus:border-0 w-full  focus:ring-0  block font-semibold ">
                                <option>Select one...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class=" md:w-3/6 mx-1">
                            <label for="address" class="block font-semibold">Address:</label>
                            <input type="text" name="address" id="address"
                                class="text-input rounded focus:border-0 w-full  focus:ring-0 "
                                value="{{ $seeker->address }}">
                        </div>


                    </div>
                         <div class="md:flex">
                  
                        <div class=" md:w-3/6 mx-1">
                            <label for="country" class="block font-semibold">Country:</label>
                            <input type="text" name="country" id="country"
                                class="text-input rounded focus:border-0 w-full  focus:ring-0 "
                                value="{{ $seeker->country }}">
                        </div>
                            <div class=" md:w-3/6 mx-1">
                            <label for="state" class="block font-semibold">State:</label>
                            <input type="text" name="state" id="state"
                                class="text-input rounded focus:border-0 w-full  focus:ring-0 "
                                value="{{ $seeker->state }}">
                        </div>


                    </div>
                    <div class="my-5 ">
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-red-200 hover:text-red-300 px-6 py-2 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <!-- JavaScript for Modals -->
@endsection
