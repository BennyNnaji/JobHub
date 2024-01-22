<h2 class="text-lg text-gray-400">Education History</h2>
<p class="font-medium break-words leading-normal pt-2 ">
    {!! nl2br($user->summary) !!}
</p>
{{-- Modal Trigger Button --}}
<button class="bg-green-500 text-white px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center "
    onclick="openEducation()"> <i class="fa-solid fa-plus"></i></button>

<!-- Centered Modal -->
<div id="education" class="fixed inset-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50 z-50 rounded"
    onclick="closeEducation()">
    <div class="bg-white p-8 rounded shadow-lg w-4/5 md:w-3/5" onclick="event.stopPropagation()">
        <h3 class="mb-2 text-2xl font-bold text-gray-800">Add Education</h3>

        <!-- Form -->
        <div class="w-full ">
            <form action="" method="post">
                <label for="institution" class="block text-left">Institution</label>
                <input type="text" name="institution" id="institution" value="{{ old('institution') }}"
                    class="rounded p-3 w-full ">
                @error('institution')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <label for="qualification" class="block text-left">Qualification/Course</label>
                <input type="text" name="qualification" id="qualification" class="rounded p-3 w-full ">
                @error('qualification')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror




                <label for="grad_year" class="block text-left">Graduation Year</label>
                <input type="month" name="grad_year" id="grad_year" class="rounded p-3 w-full">
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
<script>
    // Education
    function openEducation() {
        document.getElementById('education').classList.remove('hidden');
    }

    function closeEducation() {
        document.getElementById('education').classList.add('hidden');
    }
</script>
