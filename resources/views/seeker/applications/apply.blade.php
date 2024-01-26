@extends('layouts.app')

@section('content')
    <section class=" w-11/12 md:w-5/6 mx-auto min-h-screen">
        <div>
            <p class=" rounded-tl-lg my-2 rounded-br-lg bg-red-600 text-red-100 px-2 py-3">You are applying for the position
                of <strong>{{ $job->job_title }} </strong> at <strong>{{ $job->company->name }}</strong></p>
        </div>
        <form action="{{ route('apply_job_store', $job->id) }}" method="post" class="md:w-4/6 mx-auto w-5/6" enctype="multipart/form-data">
            @csrf
            <div  class="w-4/6">
                <label for="resume" class="block ">Resume<sup class="text-red-500">*</sup> <sub class="italic"> Pdf Only</sub></label>
                <input type="file" name="resume" id="resume" accept="application/pdf" class="w-full p-5 my-3 border-red-500 border-2 rounded">
            </div>
                 @error('resume')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                
            @enderror
            <div id="upload_letter" class="w-4/6">
                <label for="cover_letter" class="block ">Cover Letter<sub class="italic"> Pdf Only</sub></label>
                <input type="file" name="cover_letter_upload" id="cover_letter" accept="application/pdf" class="w-full p-5 my-3 border-red-500 border-2 rounded">
            </div>
            @error('cover_letter_upload')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            
        @enderror
           <div class="my-3">
            <input type="checkbox" name="type" id="type"> &nbsp; <label for="type" class="inline">Prefer to Type the Cover Letter here?Prefer to Type the Cover Letter here?</label>
           </div>
            <div class="hidden" id="type_letter">
                <label for="cover_letter"> Cover Letter </label>
                <textarea name="cover_letter_type" id="cover_letter">{{ old('cover_letter_type') }}</textarea>
            </div>
            @error('cover_letter_type')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                
            @enderror

            <div class="my-4">
                <button type="submit" class="px-8 py-4 rounded bg-red-500 text-red-200 hover:bg-red-600 hover:text-red-300">Apply</button>
            </div>
        </form>

    </section>
    <script>
        const type = document.querySelector('#type');
        const letter = document.querySelector('#type_letter');
        const upload_letter = document.querySelector('#upload_letter');
        type.addEventListener('change', () => {
            letter.classList.toggle('hidden');
            upload_letter.classList.toggle('hidden');
        });
    </script>
@endSection
