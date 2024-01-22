<h2 class="text-lg text-gray-400">Career History</h2>

@if (!empty($seeker->career) && is_array($seeker->career))
    @foreach ($seeker->career as $index => $careerEntry)
        <div class="break-words leading-normal my-2  border-2 border-gray-200 rounded p-2">
            <p class="font-bold"> {{ $careerEntry['company'] }}</p>
            <p class="italic text-sm"> {{ $careerEntry['position'] }}</p>
            <p> {{ date('F d, Y', strtotime($careerEntry['from'])) }} -
                {{ $careerEntry['to'] ? date('F d, Y', strtotime($careerEntry['to'])) : 'Present' }}
            </p>

            <p class="font-semibold mb-3"> {!! $careerEntry['description'] !!}</p>

            <div class="flex items-center">
                <div class="border-green-500 border-2 px-3 my-7 py-2 rounded hover:border-green-600 mx-1" title="Edit">
                    <a href="{{ route('profile_career_edit', ['careerIndex' => $index]) }}">Edit</a>
                </div>

                <div class="border-red-500 border-2 px-3 my-7 py-2 rounded hover:border-red-600 mx-1">
                    <form id="deleteForm{{ $index }}"
                        action="{{ route('profile_career_delete', ['careerIndex' => $index]) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="button" onclick="confirmDelete({{ $index }});"
                            title="Delete">Delete</button>
                    </form>
                </div>

            </div>

        </div>
    @endforeach
@else
    <p>No career information available</p>
@endif



{{-- Modal Trigger Button --}}
<button class="bg-green-500 text-white px-5 py-3 rounded-full h-10 w-10 flex items-center justify-center"
    onclick="openCareer()"> <i class="fa-solid fa-plus"></i></button>

<!-- Centered Modal -->
<div id="career" class="fixed inset-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50 z-50 rounded"
    onclick="closeCareer()">
    <div class="bg-white p-8 rounded shadow-lg w-4/5 md:w-3/5" onclick="event.stopPropagation()">
        <h3 class="mb-2 text-2xl font-bold text-gray-800">Add Career</h3>

        <!-- Form -->
        <div class="w-full ">
            <form action="{{ route('profile_career') }}" method="post">
                @csrf
                @if (isset($careerIndex))
                    @method('put')
                @endif
                <label for="position" class="block text-left">Position</label>
                <input type="text" name="position" id="position" class="rounded p-3 w-full"
                    value="{{ $seeker->career['position'] ?? old('position') }}">
                @error('position')
                    <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                        {{ $message }}</div>
                @enderror

                <label for="company" class="block text-left">Company</label>
                <input type="text" name="company" id="company" class="rounded p-3 w-full"
                    value="{{ $seeker->career['company'] ?? old('company') }}">
                @error('company')
                    <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                        {{ $message }}</div>
                @enderror

                <div class="flex w-full gap-x-9">
                    <div id="fromDate">
                        <label for="from" class="block text-left">Start</label>
                        <input type="date" name="from" id="from" class="rounded p-3 w-full"
                            value="{{ $seeker->career['from'] ?? old('from') }}">
                        @error('from')
                            <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                                {{ $message }}</div>
                        @enderror
                    </div>
                    <div id="toDate">
                        <label for="to" class="block text-left">End</label>
                        <input type="date" name="to" id="to"
                            value="{{ $seeker->career['to'] ?? old('to') }}" class="rounded p-3 w-full">
                        @error('to')
                            <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                                {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="py-3">
                        <label for="current"> Currently Working</label>
                        <input type="checkbox" name="current" id="current">
                    </div>
                </div>

                <label for="description" class="block text-left">Description <span
                        class="text-xs italic">(Optional)</span></label>
                <textarea name="description" id="description" class="rounded p-3 w-full"> {{ $seeker->career['description'] ?? old('description') }}</textarea>
                @error('description')
                    <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                        {{ $message }}</div>
                @enderror
                <div class="flex justify-between my-3">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 px-5 py-3 rounded focus:ring-green-600 text-green-200 hover:text-green-300">Add
                        Career</button>
                    <p class="cursor-pointer bg-red-500 hover:bg-red-600 text-red-200 hover:text-red-300 px-5 py-3 rounded"
                        onclick="closeCareer()">Close</p>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- /Modal Content --}}
<script>
    // Datepicker for from and to
         const toDate = document.getElementById('toDate');
        const current = document.getElementById('current');
        const fromDate = document.getElementById('fromDate');

        current.addEventListener('change', function() {
            if (current.checked) {
                toDate.classList.add('hidden');
                toDate.value = 'null';
                fromDate.classList.add('w-full');
            } else {
                toDate.classList.remove('hidden');
                fromDate.classList.remove('w-full');
            }
        });


    // Career open and close
    function openCareer() {
        document.getElementById('career').classList.remove('hidden');
    }

    function closeCareer() {
        document.getElementById('career').classList.add('hidden');
    }
  
    // Date picker
    document.addEventListener('DOMContentLoaded', function() {
            // Get the 'from' and 'to' elements
            let from = document.getElementById('from');
            let to = document.getElementById('to');
            let today = new Date();
            from.max = today.toISOString().split('T')[0];

            // Attach an event listener to 'from' input
            from.addEventListener('change', function() {
                // Set the 'min' attribute of 'to' input to the selected 'from' date

                to.min = from.value;
                to.max = today.toISOString().split('T')[0];

                // If 'to' date is already selected and is before the new 'min' date, clear its value
                if (to.value && to.value < from.value) {
                    to.value = '';
                }
            });
        });
       
        // Delete Confirmation
        function confirmDelete(index) {
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this career entry!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    document.getElementById('deleteForm' + index).submit();
                } else {
                    // If canceled, show a message (optional)
                    Swal.fire("Canceled", "Career entry was not deleted", "info");
                }
            });
        }
 
</script>
