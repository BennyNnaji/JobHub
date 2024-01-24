<h2 class="text-lg text-gray-400">Education History</h2>
@if (!empty($seeker->education) && is_array($seeker->education))
    @foreach ($seeker->education as $index => $education)
        <div class="break-words leading-normal my-2  border-2 border-gray-200 rounded p-2">
            <p class="font-medium break-words leading-normal pt-2 ">
                {!! nl2br($education['institution']) !!}
            </p>
            <p class="italic text-sm"> {{ $education['qualification'] }}</p>
            <p class="italic text-sm"> {{ date('F d, Y', strtotime($education['grad_year'])) }}</p>
            <p class="my-3 text-sm italic"> {!! nl2br($education['edu_description']) !!}</p>

            <div class="flex items-center">
                <div class="border-green-500 border-2 px-3 my-7 py-2 rounded hover:border-green-600 mx-1" title="Edit">
                    <a href="{{ route('profile_education_edit', ['eduIndex' => $index]) }}">Edit</a>
                </div>

                <div class="border-red-500 border-2 px-3 my-7 py-2 rounded hover:border-red-600 mx-1">
                    <form id="eduDelete{{ $index }}"
                        action="{{ route('profile_education_delete', ['eduIndex' => $index]) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="button" onclick="eduDelete({{ $index }});"
                            title="Delete">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    @endforeach
@else
    <p>No Education information available</p>
@endif
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
            <form action="{{ route('profile_education') }}" method="post">
                @csrf
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
                <input type="date" name="grad_year" id="grad_year" class="rounded p-3 w-full">
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

          // Delete Confirmation
          function eduDelete(index) {
            Swal.fire({
                title: "Are you sure?",
                text: "This is irreversible!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    document.getElementById('eduDelete' + index).submit();
                } else {
                    // If canceled, show a message (optional)
                    Swal.fire("Canceled", "Your entry was not deleted", "info");
                }
            });
        }
</script>
