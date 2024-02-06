@extends('layouts.app')
@section('content')
    <section class="w-11/12 md:w-5/6 mx-auto">
        <div class="w-5/6 md:w-4/6 mx-auto my-5">
            <form method="POST" action="{{ route('password_update') }}">
                @csrf
                <div class="mb-3">
                    <label for="old_password" class="block ">Old Password</label>
                    <input type="password" class="w-full rounded ring-0 focus:ring-0" placeholder="Old Password"
                        id="old_password" name="old_password">
                </div>
                @error('old_password')
                <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                    {{ $message }}</div>
            @enderror
                <div class="mb-3">
                    <label for="password" class="block ">Password</label>
                    <input type="password" class="w-full rounded ring-0 focus:ring-0" placeholder=" Password" id="password"
                        name="password">
                </div>
                @error('password')
                <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                    {{ $message }}</div>
            @enderror
                <div class="mb-3">
                    <label for="password_confirmation" class="block">Confirm Password</label>
                    <input type="password" class="w-full rounded ring-0 focus:ring-0" placeholder=" Confirm Password"
                        id="password_confirmation" name="password_confirmation">
                </div>
                @error('password_confirmation')
                    <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                        {{ $message }}</div>
                @enderror
                <button type="submit" class=" hover:bg-red-600 bg-red-500 text-red-200  hover:first-letter:text-red-300 p-2 rounded">Update Password</button>

            </form>
        </div>
    </section>
@endsection
