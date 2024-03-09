@extends('company.layout.app')
@section('content')
    <div class="w-full rounded-t-2xl bg-gray-400 text-gray-200 font-semibold text-3xl px-4 flex justify-between mb-2">
        <div>
            Message Applicant
        </div>
        <div class="w-2/12 md:w-auto">
            <a href="{{ url()->previous() }}"><img src="{{ asset('images/front/back.png') }}" alt="icon" class="w-full"></a>
        </div>
    </div>
    <section class="w-3/4 elevation-10 rounded-b-lg mx-auto ">
        <div class="w-full md:w-10/12 mx-auto p-3">
            <form action="" method="post">
                @csrf
                <div class="w-11/12 md:w-5/6">
                    <label for="subject" class="block text-black font-semibold"> Subject</label>
                    <input type="text" name="subject" id="subject" class="w-full p-2 rounded ring-0 focus:ring-0" value="{{ old('subject') }}" placeholder="Subject of your message">
                    @error('subject')
                    <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                        {{ $message }}</div>
                @enderror
                </div>
                <input type="hidden" name="receiver_id" value="{{ $application->seeker->id }}">
                <input type="hidden" name="job_id" value="{{ $application->job->id }}">
                <div class="w-11/12 md:w-5/6">
                    <label for="message" class="block text-black font-semibold">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="w-full p-2 rounded ring-0 focus:ring-0">{{ old('message') }}</textarea>
                    @error('message')
                    <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                        {{ $message }}</div>
                @enderror
                </div>
                <div class="my-5 w-2/6">
                    <button type="submit" class="bg-green-500 text-green-200 hover:bg-green-600 hover:text-green-300 rounded px-4 py-2 ">Send Message</button>
                </div>
            </form>


    </section>
@endsection
