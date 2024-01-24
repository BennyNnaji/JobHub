<h2 class="text-lg text-gray-400">Languages</h2>
@if (!empty($seeker->language) && is_array($seeker->language))
<div class="grid grid-cols-4 gap-5 text-center">
    @foreach ($seeker->language as $index => $language)
        <span class=" border-2 border-gray-200 rounded p-2 ">
            {{ $language['language'] }}

            <form id="langDelete{{ $index }}" class="inline"
                action="{{ route('profile_languages_delete', ['langIndex' => $index]) }}" method="post">
                @csrf
                @method('delete')

                <button type="button" onclick="langDelete({{ $index }});" title="Delete"><i
                        class="fa-solid fa-trash text-red-500"></i></button>
            </form>
        </span>
    @endforeach
</div>
@else
    <p>No language information available</p>
@endif
{{-- Modal Trigger Button --}}
<button class="bg-green-500 text-white px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center "
    onclick="openLanguage()"> <i class="fa-solid fa-plus"></i></button>

<!-- Centered Modal -->
<div id="language" class="fixed inset-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50 z-50 rounded"
    onclick="closeLanguage()">
    <div class="bg-white p-8 rounded shadow-lg w-4/5 md:w-3/5" onclick="event.stopPropagation()">
        <h3 class="mb-2 text-2xl font-bold text-gray-800">Add Language</h3>

        <!-- Form -->
        <div class="w-full ">
            <form action="{{ route('profile_languages') }}" method="post">
                @csrf
                <label for="language" class="block text-left">Language</label>
                <input type="text" name="language" id="language" class="rounded p-3 w-full ">
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
<script>
    // Language
    function openLanguage() {
        document.getElementById('language').classList.remove('hidden');
    }

    function closeLanguage() {
        document.getElementById('language').classList.add('hidden');
    }

        // Delete Confirmation
        function langDelete(index) {
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
                    document.getElementById('langDelete' + index).submit();
                } else {
                    // If canceled, show a message (optional)
                    Swal.fire("Canceled", "Your entry was not deleted", "info");
                }
            });
        }
</script>
