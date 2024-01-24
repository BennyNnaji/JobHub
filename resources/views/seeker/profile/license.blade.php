<h2 class="text-lg text-gray-400">Licences</h2>
@if (!empty($seeker->license) && is_array($seeker->license))
    @foreach ($seeker->license as $index => $license)
        <div class="break-words leading-normal my-2  border-2 border-gray-200 rounded p-2">
            <p class="font-medium break-words leading-normal pt-2 ">
              <small class="text-sm font-bold">License Name:</small>  {!! nl2br($license['license_name']) !!}
            </p>
             <p class="italic text-sm"><small class="text-sm font-bold">Issued By:</small> {{ $license['issuing_org'] }}</p>
            <p class="italic text-sm"><small class="text-sm font-bold">Issued Date:</small> {{ date('F d, Y', strtotime($license['issued_date'])) }}  {!!  ($license['exp_date']) ?  '<br> <small class="text-sm font-bold">Expires On: </small> '. date('F d, Y', strtotime($license['exp_date'])) : '' !!}</p>
            <p class="text-sm italic"> {!! nl2br($license['description']) ? '<small class="text-sm font-bold">Description:</small>'. nl2br($license['description']) : '' !!}</p>

            <div class="flex items-center">
                <div class="border-green-500 border-2 px-3 my-7 py-2 rounded hover:border-green-600 mx-1" title="Edit">
                    <a href="{{ route('profile_license_edit', ['licenseIndex' => $index]) }}">Edit</a>
                </div>

                <div class="border-red-500 border-2 px-3 my-7 py-2 rounded hover:border-red-600 mx-1">
                    <form id="licDelete{{ $index }}"
                        action="{{ route('profile_license_delete', ['licenseIndex' => $index]) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="button" onclick="licDelete({{ $index }});"
                            title="Delete">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    @endforeach
@else
    <p>No License information available</p>
@endif
{{-- Modal Trigger Button --}}
<button class="bg-green-500 text-white px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center "
    onclick="openLicence()"> <i class="fa-solid fa-plus"></i></button>

<!-- Centered Modal -->
<div id="licence"
    class="fixed inset-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50 z-50 rounded w-full"
    onclick="closeLicence()">
    <div class="bg-white p-8 rounded shadow-lg w-4/5 md:w-3/5" onclick="event.stopPropagation()">
        <h3 class="mb-2 text-2xl font-bold text-gray-800">Add Licence</h3>

        <!-- Form -->
        <div class="w-full ">
            <form action="{{ route('profile_license') }}" method="post">
                @csrf
                <label for="license_name" class="block text-left">Licence Name</label>
                <input type="text" name="license_name" id="license_name" class="rounded p-3 w-full "
                    value="{{ old('license_name') }}">
                @error('license_name')
                    <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror

                <label for="issuing_org" class="block text-left">Issuing Organization</label>
                <input type="text" name="issuing_org" id="issuing_org" class="rounded p-3 w-full "
                    value="{{ old('issuing_org') }}">
                @error('issuing_org')
                    <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror



                <label for="issued_date" class="block text-left">Date Issued</label>
                <input type="date" name="issued_date" id="issued_date" class="rounded p-3 w-full"
                    value="{{ old('issued_date') }}">
                @error('issued_date')
                    <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror


                <label for="exp_date" class="block text-left" >Expiry Date
                    <input type="date" name="exp_date" id="exp_date" class="rounded p-3 w-full" value="{{ old('exp_date') }}">
                </label>
                @error('exp_date')
                    <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror


                <div class="my-3">
                    <input type="checkbox" name="never" id="never_exp">
                    <label for="never_exp">Doesn't Expire</label>
                </div>

                <label for="description" class="block text-left">Description <span
                        class="text-xs italic">(Optional)</span></label>
                <small>Briefly describe this credential – you can also add a type or URL if
                    applicable.</small>
                <textarea name="description" id="description" class="rounded p-3 w-full">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
                <div class="flex justify-between my-3">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 px-5 py-3 rounded focus:ring-green-600 text-green-200 hover:text-green-300">Add
                        Licence</button>
                    <p class="cursor-pointer bg-red-500 hover:bg-red-600 text-red-200 hover:text-red-300 px-5 py-3 rounded"
                        onclick="closeLicence()">Close</p>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- /Modal Content --}}

<script>
    // Licence modal functions
    function openLicence() {
        document.getElementById('licence').classList.remove('hidden');
    }

    function closeLicence() {
        document.getElementById('licence').classList.add('hidden');
    }

    // Toggle Expiry Date
    const neverExpCheckbox = document.getElementById('never_exp');
    const expDateInput = document.getElementById('exp_date');

    neverExpCheckbox.addEventListener('change', function() {
        if (this.checked) {
            expDateInput.classList.add('hidden');
        } else {
            expDateInput.classList.remove('hidden');
        }
    });
 const issued_date = document.getElementById('issued_date');
 const exp_date = document.getElementById('exp_date');
 issued_date.addEventListener('change', function() {
     exp_date.min = issued_date.value;
 });
 // Delete Confirmation
 function licDelete(index) {
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
                    document.getElementById('licDelete' + index).submit();
                } else {
                    // If canceled, show a message (optional)
                    Swal.fire("Canceled", "Your entry was not deleted", "info");
                }
            });
        }
</script>
