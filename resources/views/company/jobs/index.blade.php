    @extends('company.layout.app')
    @section('content')
        <div class="w-full rounded-t-2xl bg-gray-400 text-gray-200 font-semibold text-3xl px-4 flex justify-between">
            <div>
                Posted Jobs
            </div>
            <div class="w-2/12 md:w-auto">
                <a href="{{ url()->previous() }}"><img src="{{ asset('images/front/back.png') }}" alt="icon"
                        class="w-full"></a>
            </div>
        </div>
        @if (count($jobs) > 0)
            <div class="w-11/12 md:w-5/6 mx-auto grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 my-3">
                <!-- Dummy Grid -->
                @foreach ($jobs as $job)
                    <div class="bg-gray-200 p-4 border-2 border-red-600/50 rounded ">
                        <h2 class="text-lg text-left font-semibold">{{ $job->job_title }} {!! $job->job_status == 1 && $job->deadline > Carbon\Carbon::now()
                            ? '<i class="fa-solid fa-toggle-on text-green-500"></i>'
                            : '<i class="fa-solid fa-toggle-off text-red-500"></i>' !!}</h2>
                        <p class="text-xs italic text-gray-400">
                            <span>
                                <i class="fa-solid fa-location-dot"></i>{{ $job->job_location }}
                            </span>
                            <span>
                                <i class="fa-solid fa-clock"></i> {{ $job->created_at->diffForHumans() }}
                            </span>
                            <span>
                                <i class="fa-solid fa-money-bill"></i> ${{ $job->max_salary }} - ${{ $job->max_salary }}
                            </span>
                        </p>

                        <div>
                            <p class="italic text-xs"> {!! Str::limit($job->job_description, 100, '...') !!}</p>

                            <p class="text-red-500">
                                {{ $job->job_type }}</p> <br>
                            @if ($job->deadline > Carbon\Carbon::now())
                                <a href="{{ route('company_jobs.show', $job->id) }}"
                                    class="px-4 py-2 rounded bg-green-500 text-white hover:bg-green-600 ">Edit</a>
                                <form id="deleteForm{{ $job->id }}"
                                    action="{{ route('company_jobs.delete', $job->id) }}" method="post" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white hover:bg-red-600 rounded px-4 py-2"
                                        data-job-id="{{ $job->id }}">Delete</button>
                                </form>
                            @else
                                <span class="px-4 py-2 rounded bg-yellow-500 text-white hover:bg-yellow-600 ">
                                    Expired</span>
                            @endif





                        </div>
                    </div>
                @endforeach




            </div>
        @else
            <div class="w-1/4 mx-auto text-center italic text-2xl my-8">No Jobs</div>
        @endif

        @if (session('error'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "error",
                    title: "{{ session('error') }}"
                });
            </script>
        @endif
        @if (session('success'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "{{ session('success') }}"
                });
            </script>
        @endif
        <script>
            document.querySelectorAll('[data-job-id]').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    const jobId = this.getAttribute('data-job-id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You won\'t be able to revert this!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('deleteForm' + jobId).submit();
                        }
                    });
                });
            });
        </script>

    @endsection
