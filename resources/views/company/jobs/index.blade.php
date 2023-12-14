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
        @if (count($jobs)> 0)
        
        <div class="w-11/12 md:w-5/6 mx-auto grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 my-3">
            <!-- Dummy Grid -->
            @foreach ($jobs as $job)
                <a href="">
                    <div class="bg-gray-200 p-4 border-2 border-red-600/50 rounded ">
                        <h2 class="text-lg text-left font-semibold">{{ $job->job_title }}</h2>
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

                            <p class="bg-red-500 text-white p-2 rounded my-2 w-3/6 text-center hover:bg-red-600">
                                {{ $job->job_type }}</p>
                        </div>
                    </div>
                </a>
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
    @endsection
