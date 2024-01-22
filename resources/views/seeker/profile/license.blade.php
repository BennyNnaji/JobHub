<h2 class="text-lg text-gray-400">Licences</h2>
<p class="font-medium break-words leading-normal pt-2 ">
    {!! nl2br($user->summary) !!}
</p>
{{-- Modal Trigger Button --}}
<button
    class="bg-green-500 text-white px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center "
    onclick="openLicence()"> <i class="fa-solid fa-plus"></i></button>

<!-- Centered Modal -->
<div id="licence"
    class="fixed inset-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50 z-50 rounded w-full"
    onclick="closeLicence()">
    <div class="bg-white p-8 rounded shadow-lg w-4/5 md:w-3/5" onclick="event.stopPropagation()">
        <h3 class="mb-2 text-2xl font-bold text-gray-800">Add Licence</h3>

        <!-- Form -->
        <div class="w-full ">
            <form action="" method="post">
                <label for="licence_name" class="block text-left">Licence Name</label>
                <input type="text" name="licence_name" id="licence_name" class="rounded p-3 w-full ">

                <label for="issuing_org" class="block text-left">Issuing Organization</label>
                <input type="text" name="issuing_org" id="issuing_org" class="rounded p-3 w-full ">



                <label for="issued_date" class="block text-left">Date Issued</label>
                <input type="month" name="issued_date" id="issued_date" class="rounded p-3 w-full">


                <label for="exp_date" class="block text-left" id="exp_date">Expiry Date
                    <input type="month" name="exp_date" class="rounded p-3 w-full">
                </label>


                <input type="checkbox" name="never" id="never_exp" onchange="toggleExpiryDate()">
                <label for="never_exp">Doesn't Expire</label>

                <label for="description" class="block text-left">Description <span
                        class="text-xs italic">(Optional)</span></label>
                <small>Briefly describe this credential – you can also add a type or URL if
                    applicable.</small>
                <textarea name="description" id="description" class="rounded p-3 w-full"></textarea>
                <div class="flex justify-between my-3">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 px-5 py-3 rounded focus:ring-green-600 text-green-200 hover:text-green-300">Add
                        Career</button>
                    <p class="cursor-pointer bg-red-500 hover:bg-red-600 text-red-200 hover:text-red-300 px-5 py-3 rounded"
                        onclick="closeLicence()">Close</p>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- /Modal Content --}}