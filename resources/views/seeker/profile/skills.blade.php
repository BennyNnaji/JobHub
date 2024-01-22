<h2 class="text-lg text-gray-400">Skills</h2>
<p class="font-medium break-words leading-normal pt-2 ">
    {!! nl2br($user->summary) !!}

</p>
{{-- Modal Trigger Button --}}
<button class="bg-green-500 text-white px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center "
    onclick="openSkill()"> <i class="fa-solid fa-plus"></i></button>

<!-- Centered Modal -->
<div id="skill" class="fixed inset-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50 z-50 rounded"
    onclick="closeSkill()">
    <div class="bg-white p-8 rounded shadow-lg w-4/5 md:w-3/5" onclick="event.stopPropagation()">
        <h3 class="mb-2 text-2xl font-bold text-gray-800">Add Skill</h3>

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
                        <input type="month" name="start_month" id="start_month" class="rounded p-3 w-full">
                    </div>
                    <div>
                        <label for="end_month" class="block text-left">End</label>
                        <input type="month" name="end_month" id="end_month" class="rounded p-3 w-full">
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
<script>
    // Skill
    function openSkill() {
        document.getElementById('skill').classList.remove('hidden');
    }

    function closeSkill() {
        document.getElementById('skill').classList.add('hidden');
    }
</script>
