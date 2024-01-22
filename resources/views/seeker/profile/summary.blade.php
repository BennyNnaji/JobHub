<h2 class="text-lg text-gray-400">Profile Summary</h2>
@if ($user->summary)
    <div class="font-medium break-words leading-normal pt-2  border-2 border-gray-200 rounded p-2">
        {!! $user->summary !!}
    </div>
    <i class="fa-solid fa-pen  px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center cursor-pointer text-green-500"
        title="Update Profile Summary" onclick="openSummary()"></i>
@else
    <button title="Add Profile Summary"
        class="bg-green-500 text-white px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center "
        onclick="openSummary()"> <i class="fa-solid fa-plus"></i></button>
@endif

<!-- Centered Modal -->
<div id="summary"
    class="fixed inset-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50 z-50 rounded "
    onclick="closeSummary()">
    <div class="bg-white p-8 rounded shadow-lg w-4/5 md:w-3/5" onclick="event.stopPropagation()">
        <h3 class="mb-2 text-2xl font-bold text-gray-800">Profile Summary</h3>

        <!-- Form -->
        <div class="w-full ">
            <form action="{{ route('profile_summary') }}" method="post">
                @csrf

                <label for="summary" class="block text-left">Description </label>
                <textarea name="summary" id="summary" class="rounded p-3 w-full h-96">
                    @if ($user->summary)
                    {{ $user->summary }}
                    @else
                    {{ old('summary') }}
                    @endif
                </textarea>
                <div class="flex justify-between my-3">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 px-5 py-3 rounded focus:ring-green-600 text-green-200 hover:text-green-300">Summit</button>
                    <p class="cursor-pointer bg-red-500 hover:bg-red-600 text-red-200 hover:text-red-300 px-5 py-3 rounded"
                        onclick="closeSummary()">Close</p>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Profile Summary
        function openSummary() {
            document.getElementById('summary').classList.remove('hidden');
        }

        function closeSummary() {
            document.getElementById('summary').classList.add('hidden');
        }
    </script>