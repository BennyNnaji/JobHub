@extends('layouts.app')
@section('content')
    <section class="md:flex w-11/12 md:w-5/6 mx-auto">
        <div class="md:w-3/5 mb-5">

            <div class="bg-red-500 p-3 text-white font-bold ">Job Details</div>
            <div class="flex justify-between">
                @if(session('status'))
                <div class="mt-4 p-2 bg-green-500 text-white rounded">
                    {{ session('status') }}
                </div>
            @endif
                <div class=" flex justify-start space-x-2 items-center my-2">
                    <div class="w-1/5 ">
                        @if (!$job->company->logo)
                            <img src="https://picsum.photos/200" alt="Company logo" class="w-full rounded-full">
                        @else
                            <img src="{{ asset('storage/company/Images/' . $job->company->logo) }}" alt="Company logo">
                        @endif
                    </div>
                    <div class="text-2xl mx-2 w-4/5">{{ $job->company->name }}</div>
                </div>
                @if (!Auth::guard('company')->check())
                    @if (Auth::guard('seeker')->check())
                        <div class="my-2">
                            {{-- <form action="{{ route('save_job', $job->id) }}" method="post"> --}}
                            <!-- resources/views/jobs/show.blade.php -->

                            <p id="saveJobBtn" class="cursor-pointer bg-green-500 px-3 py-2 rounded-t text-white my-1"
                                onclick="saveJob()"> <i class="fa-solid fa-heart"></i> Save</p>

                            {{-- </form> --}}
                            <p class="cursor-pointer bg-yellow-500 px-3 py-2 rounded-b text-white my-1"> <i
                                    class="fa-solid fa-triangle-exclamation"></i> Report</p>

                        </div>
                    @endif
                @endif

            </div>
            <h2 class="font-semibold ">{{ $job->job_title }}</h2>
            <div>
                <span class="block"><i class="fa-solid fa-location-dot"></i> {{ $job->job_location }}</span>
                <span class="block"><i class="fa-solid fa-layer-group"></i> {{ $job->category }}</span>
                <span class="block"><i class="fa-solid fa-hourglass-end"></i> {{ $job->job_type }}</span>
                <span class="block"><i class="fa-solid fa-money-check-dollar"></i> ${{ $job->min_salary }} -
                    ${{ $job->max_salary }}</span>
                <span class="block"><i class="fa-solid fa-clock"></i> Posted:
                    {{ $job->created_at->diffForHumans() }}</span>
                <span class="block"><i class="fa-solid fa-timeline"></i> Deadline:
                    {{ \Carbon\Carbon::parse($job->deadline)->format('F d, Y') }}</span>

            </div>
            <div class="bg-red-500 p-3 text-white mt-5 rounded-t ">Job Description</div>
            <div class="my-2 first-letter:text-4xl">{!! $job->job_description !!}</div>

            <div class="bg-red-500 p-3 text-white mt-5 rounded-t ">Responsibility/Role</div>
            <div class="my-2 first-letter:text-4xl">{!! $job->responsibility !!}</div>

            <div class="bg-red-500 p-3 text-white mt-5 rounded-t ">Benefits</div>
            <div class="my-2 first-letter:text-4xl">{!! $job->benefits !!}</div>


            @if (!Auth::guard('company')->check())
                @if (Auth::guard('seeker')->check())
                    <a href="{{ route('apply_job', $job->id) }}"
                        class="w-2/6 bg-red-500 rounded px-6 py-3 my-10 hover:bg-red-600 text-center text-red-200 hover:text-red-200">Apply
                        Now</a>
                @else
                    <a href="{{ route('seeker_login') }}"
                        class="w-2/6 bg-red-500 rounded px-6 py-3 my-10 hover:bg-red-600 text-center text-red-200 hover:text-red-200">Login
                        to Apply</a>
                @endif
            @endif


            <div class="my-10">
                <h2>Share This Job</h2>
                <i class="fa-brands fa-facebook st-custom-button cursor-pointer fa-2x text-[#1877F2]"
                    data-network="facebook"></i>
                <i class="fa-brands fa-twitter st-custom-button cursor-pointer fa-2x text-[#1DA1F2]"
                    data-network="twitter"></i>
                <i class="fa-brands fa-whatsapp st-custom-button cursor-pointer fa-2x text-[#128c7e]"
                    data-network="whatsapp"></i>
                <i class="fa-brands fa-linkedin st-custom-button cursor-pointer fa-2x text-[#0077b5]"
                    data-network="linkedin"></i>
                <i class="fa-solid fa-envelope st-custom-button cursor-pointer fa-2x text-[#e7c9a9]"
                    data-network="email"></i>
            </div>
        </div>
        <div class="md:w-2/5 mx-3">
            <div class="bg-red-500 p-3 text-white">Related Jobs</div>
            @foreach ($related_jobs as $job)
                <div class="my-3">
                    <a href="{{ route('jobs.show', $job->id) }}">
                        <div class="bg-gray-200 p-4 border-2 border-red-600/50 rounded ">
                            <h2 class="text-lg text-left font-semibold">{{ $job->job_title }}</h2>
                            <p class="text-xs italic text-gray-400">
                                <span>
                                    <i class="fa-solid fa-location-dot"></i> {{ $job->job_location }}
                                </span>
                                <span>
                                    <i class="fa-solid fa-clock"></i> {{ $job->created_at->diffForHumans() }}
                                </span>
                                <span>
                                    <i class="fa-solid fa-money-bill"></i> ${{ $job->min_salary }} -
                                    ${{ $job->max_salary }}
                                </span>
                            </p>
                            <p class="px-4 py-2 w-3/6 rounded "> {{ $job->company->name }}</p>
                            <div>
                                <p>{!! Str::limit($job->job_description, 500, '...') !!}</p>
                                </p>
                                <p class="bg-red-500 text-white p-2 rounded my-2 w-3/6 text-center">{{ $job->job_type }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach



        </div>

    </section>
    <!-- Add this script to your view or include it in your assets -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function saveJob() {
            var jobId = {{ $job->id }};
    
            $.ajax({
                type: 'POST',
                url: '/jobs/' + jobId + '/save',
                data: {},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === 'success') {
                        //alert('Job saved successfully');
                    } else {
                        //alert('Error: ' + response.message);
                    }
                    // Optionally, update the UI or perform other actions
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error saving job:', textStatus, errorThrown, jqXHR.responseText);
                    //alert('Error saving job. Please try again.');
                    // Handle the error, if needed
                }
            });
        }
    </script>
    
    

@endsection
