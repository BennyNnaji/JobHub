@extends('layouts.app')
@section('content')
    <section class="md:flex w-11/12 md:w-5/6 mx-auto">
        <div class="md:w-3/5 mb-5">

            <div class="bg-red-500 p-3 text-white font-bold ">Job Details</div>
            <div class="flex justify-between">

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
                            <div class="fixed right-1/2 px-4 py-2 text-white bg-green-500 rounded-md shadow-md transition duration-150 ease-in-out hidden"
                                id="success-alert"> <i class="fa-solid fa-check"></i>
                                Job saved!
                            </div>
                            <div class="fixed right-1/2 px-4 py-2 text-white bg-red-500 rounded-md shadow-md transition duration-150 ease-in-out hidden"
                                id="error-alert"> <i class="fa-solid fa-triangle-exclamation"></i>
                                Job unsaved!
                            </div>
                            {{-- <div class="hidden fixed right-1/2 px-4 py-2 text-white bg-green-500/50 rounded-md shadow-md transition duration-150 ease-in-out" id="myAlert"> Lorem ipsum dolor sit amet.</div> --}}
                            <form id="saveJobForm" action="{{ route('save_job', $job->id) }}" method="post">
                                @csrf
                                @php
                                    $savedJobIds = Auth::guard('seeker')
                                        ->user()
                                        ->saved_jobs->pluck('job_id')
                                        ->toArray();
                                @endphp
                                @if (in_array($job->id, $savedJobIds))
                                    <button type="button" id="saveJobBtn"
                                        class="cursor-pointer bg-green-500 px-3 py-2 rounded-t text-white my-1">
                                        <i class="fa-solid fa-heart"></i> Saved
                                    </button>
                                @else
                                    <button type="button" id="saveJobBtn"
                                        class="cursor-pointer bg-green-500 px-3 py-2 rounded-t text-white my-1">
                                        <i class="fa-solid fa-heart"></i> Save
                                    </button>
                                @endif

                            </form>


                            <button onclick="openReport()"
                                class="cursor-pointer bg-yellow-500 px-3 py-2 rounded-b text-white my-1"> <i
                                    class="fa-solid fa-triangle-exclamation"></i> Report</button>

                        </div>
                    @endif
                @endif

            </div>
            <h2 class="font-semibold ">{{ $job->job_title }} {!! $job->reported_jobs()->count() > 10 && $job->reported_jobs()->count() <= 15
                ? '<i class=\'fa-solid fa-triangle-exclamation fa-2x text-yellow-500\' title="Reported job, be careful!"></i>'
                : '' !!} {!! $job->reported_jobs()->count() > 15
                ? '<i class=\'fa-solid fa-triangle-exclamation fa-2x text-red-500\' title="Massively Reported job, be careful!"></i>'
                : '' !!}
            </h2>

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
                    @php
                        $appliedJobIds = Auth::guard('seeker')
                            ->user()
                            ->applications->pluck('job_id')
                            ->toArray();
                    @endphp
                    @if (in_array($job->id, $appliedJobIds))
                        <button disabled="disabled" class="w-2/6 bg-red-400 rounded px-6 py-3 my-10 text-center text-red-200 hover:text-red-200 cursor-not-allowed">Applied</button>
                    @else
                        <a href="{{ route('apply_job', $job->id) }}"
                            class="w-2/6 bg-red-500 rounded px-6 py-3 my-10 hover:bg-red-600 text-center text-red-200 hover:text-red-200">Apply
                            Now</a>
                    @endif
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
        <!-- Centered Modal -->
        <div id="report"
            class="absolute top-0 inset-x-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50 z-50 rounded"
            onclick="closeReport()">
            <div class="bg-white p-8 rounded shadow-lg w-4/5 md:w-3/5" onclick="event.stopPropagation()">
                <h3 class="mb-2 text-2xl font-bold text-gray-800">Report Job</h3>

                <!-- Form -->
                <div class="w-full  ">
                    <form action="{{ route('report_job', $job->id) }}" method="post">
                        @csrf
                        <label for="reason" class="block text-sm font-medium text-gray-600">Select a reason for
                            reporting:{{ $job->id }}</label>
                        <select id="reason" name="reason" class="mt-1 p-2 w-full border rounded-md">
                            <option value="misleading_information">Misleading Information</option>
                            <option value="scams_and_fraud">Scams and Fraud</option>
                            <option value="inappropriate_content">Inappropriate Content</option>
                            <option value="violations_of_terms">Violations of Terms of Service</option>
                            <option value="expired_or_duplicate_listings">Expired or Duplicate Listings</option>
                            <option value="unethical_business_practices">Unethical Business Practices</option>
                            <option value="user_feedback">User Feedback</option>
                            <option value="non_compliance_with_regulations">Non-Compliance with Regulations</option>
                            <option value="security_concerns">Security Concerns</option>
                            <option value="other">Other (Please specify)</option>
                        </select>
                        @error('reason')
                            <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                                {{ $message }}</div>
                        @enderror

                        <label for="detail" class="block text-left">Detail <span
                                class="text-xs italic">(Optional)</span></label>
                        <textarea name="detail" id="details" class="rounded p-3 w-full"> {{ old('detail') }}</textarea>
                        @error('detail')
                            <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                                {{ $message }}</div>
                        @enderror
                        <div class="flex justify-between my-3">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-600 px-5 py-3 rounded focus:ring-green-600 text-green-200 hover:text-green-300">Submit
                                Report</button>
                            <p class="cursor-pointer bg-red-500 hover:bg-red-600 text-red-200 hover:text-red-300 px-5 py-3 rounded"
                                onclick="closeReport()">Close</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- /Modal Content --}}
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
    {{-- <script>
        function saveJob() {
            let jobId = {{ $job->id }};
    
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
    </script> --}}
    <script>
        function openReport() {
            document.getElementById('report').classList.remove('hidden');
        }

        function closeReport() {
            document.getElementById('report').classList.add('hidden');
        }


        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('saveJobBtn').addEventListener('click', function() {
                saveJob();
            });
        });

        function saveJob() {
            var form = document.getElementById('saveJobForm');
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.action, true);
            xhr.setRequestHeader('X-CSRF-TOKEN', formData.get('_token'));

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    var response = JSON.parse(xhr.responseText);
                    handleResponse(response);
                }
            };

            xhr.send(formData);
        }

        function handleResponse(response) {
            if (response.success) {
                successAlert();
            } else {
                errorAlert();
            }
        }

        function successAlert() {
            const alertElement = document.getElementById('success-alert');
            alertElement.classList.remove('hidden');
            document.getElementById('saveJobBtn').innerHTML = " <i class=\"fa-solid fa-heart\"></i> Saved";
            setTimeout(() => {
                alertElement.classList.add('hidden');
            }, 5000); // Change 5000 to your desired duration in milliseconds
        }

        function errorAlert() {
            const alertElement = document.getElementById('error-alert');
            alertElement.classList.remove('hidden');
            document.getElementById('saveJobBtn').innerHTML = " <i class=\"fa-solid fa-heart\"></i> Save";
            setTimeout(() => {
                alertElement.classList.add('hidden');
            }, 5000); // Change 5000 to your desired duration in milliseconds
        }
    </script>
@endsection
