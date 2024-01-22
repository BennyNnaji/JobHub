<h2 class="text-lg text-gray-400">Languages</h2>
<p class="font-medium break-words leading-normal pt-2  ">
    {!! nl2br($user->summary) !!}
</p>
{{-- Modal Trigger Button --}}
<button
    class="bg-green-500 text-white px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center "
    onclick="openLanguage()"> <i class="fa-solid fa-plus"></i></button>

<!-- Centered Modal -->
<div id="language"
    class="fixed inset-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50 z-50 rounded"
    onclick="closeLanguage()">
    <div class="bg-white p-8 rounded shadow-lg w-4/5 md:w-3/5" onclick="event.stopPropagation()">
        <h3 class="mb-2 text-2xl font-bold text-gray-800">Add Language</h3>

        <!-- Form -->
        <div class="w-full ">
            <form action="" method="post">
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