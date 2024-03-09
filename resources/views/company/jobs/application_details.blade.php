@extends('company.layout.app')

@section('content')
    <div class="w-full rounded-t-2xl bg-gray-400 text-gray-200 font-semibold text-3xl px-4 flex justify-between">
        <div>
            Job Applications Details
        </div>
        <div class="w-2/12 md:w-auto">
            <a href="{{ url()->previous() }}"><img src="{{ asset('images/front/back.png') }}" alt="icon" class="w-full"></a>
        </div>
    </div>
    <section class="elevation-10 w-4/5 p-3 mx-auto ">
        <p class="text-red-600 leading-3 tracking-widest"> {{ $application->job->job_title }} <span
                class="text-xs text-green-500 italic capitalize">{{ str_replace('_', ' ', $application->status['status']) }}</span>
        </p>
        <div>
            <div class="md:flex justify-between">
                <div class="w-5/6">
                    <p class="text-gray-500 ">{{ $application->seeker->name }}</p>
                    <p>{{ $application->seeker->email }}</p>
                    <p>{{ $application->seeker->phone }}</p>
                    <p>{{ $application->seeker->address }}</p>
                    <p>{{ $application->seeker->city }}</p>
                    <p>{{ $application->seeker->state }}</p>
                    <p>{{ $application->seeker->country }}</p>
                    <p> <a href="{{ $resume_url }}" download="{{ $application->resume }}">Download Resume <i
                                class="fa-solid fa-file-pdf text-red-500"></i></a>
                    </p>
                    @if (!empty($application->cover_letter_type))
                        {{-- Applicant's Cover Letter --}}
                        <div class="border-2 border-red-600/50 rounded p-2 my-3">
                            <p><strong>Cover Letter</strong> {!! $application->cover_letter_type !!}</p>
                        </div>
                    @else
                        <p> <a href="{{ $CoverLetter_url }}" download={{ $application->cover_letter_upload }}>Download
                                Cover Letter <i class="fa-solid fa-file-pdf text-red-500"></i></a> </p>
                    @endif
                </div>
                <div class="1/6">
                    @error('status')
                        <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                            {{ $message }}</div>
                    @enderror
                    @if (
                        $application->status['status'] !== 'offer_extended' &&
                            $application->status['status'] !== 'hired' &&
                            $application->status['status'] !== 'not_selected' &&
                            $application->status['status'] !== 'withdrawn')
                        <button onclick="openStatus()"
                            class="px-4 py-2 rounded border-2 border-green-500 text-black hover:bg-green-600 hover:text-white block m-2">Update
                            Status</button>
                    @endif


                    <button
                        class="px-4 py-2 rounded border-2 border-green-500 text-black hover:bg-green-600 hover:text-white block m-2"> <a href="{{ route('DisplayMsgForm', $application->id) }}"> Message&nbsp;Applicant</a></button>
                    <!-- Centered Modal -->
                    <div id="status"
                        class="absolute top-0 inset-x-0 flex items-center justify-center hidden bg-gray-500 bg-opacity-50 z-50 rounded"
                        onclick="closeStatus()">
                        <div class="bg-white p-8 rounded shadow-lg w-4/5 md:w-3/5" onclick="event.stopPropagation()">
                            <h3 class="mb-2 text-2xl font-bold text-gray-800">Update Application</h3>


                            <!-- Form -->
                            <div class="w-full  ">
                                <form action="{{ route('updateStatus', $application->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <label for="status" class="block text-sm font-medium text-gray-600">Application
                                        Status:</label>
                                    <select name="status" id="status" class="mt-1 p-2 w-full border rounded-md">
                                        <option value="submitted">Submitted/Received</option>
                                        <option value="under_review">Under Review</option>
                                        <option value="shortlisted">Shortlisted/In Progress</option>
                                        <option value="interview_scheduled">Interview Scheduled</option>
                                        <option value="interviewed">Interviewed</option>
                                        <option value="reference_check">Reference Check</option>
                                        <option value="offer_extended">Offer Extended</option>
                                        <option value="onboarding">Onboarding</option>
                                        <option value="hired">Hired/Completed</option>
                                        <option value="not_selected">Not Selected/Rejected</option>
                                    </select>
                                    @error('status')
                                        <div class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
                                            {{ $message }}</div>
                                    @enderror
                                    <label for="status_details" class="block mt-4"> Status Details</label>
                                    <textarea name="status_details" id="status_details">{{ old('status_details') }}</textarea>
                                    <div class="flex justify-between my-3">
                                        <button type="submit"
                                            class="bg-green-500 hover:bg-green-600 px-5 py-3 rounded focus:ring-green-600 text-green-200 hover:text-green-300">Submit</button>
                                        <p class="cursor-pointer bg-red-500 hover:bg-red-600 text-red-200 hover:text-red-300 px-5 py-3 rounded"
                                            onclick="closeStatus()">Close</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- /Modal Content --}}
                </div>


            </div>

            {{-- Applicant's summary --}}
            <div class="border-2 border-red-600/50 rounded p-2 my-3">
                <p><strong>Summary</strong> {!! $application->seeker->summary !!}</p>
            </div>

            {{-- Applicant's career --}}
            <p><strong>Career History</strong></p>
            @if (!empty($career) && is_array($career))
                @foreach ($career as $careerEntry)
                    <div class="border-2 border-red-600/50 rounded p-2 my-3">

                        <strong>Company:</strong> {{ $careerEntry['company'] }}<br>
                        <strong>Position:</strong> {{ $careerEntry['position'] }}<br>
                        <strong>From:</strong> {{ \Carbon\Carbon::parse($careerEntry['from'])->format('F Y') }}<br>
                        <strong>To:</strong>
                        {{ $careerEntry['to'] ? \Carbon\Carbon::parse($careerEntry['to'])->format('F Y') : 'Present' }}<br>
                        <strong>Description:</strong> {!! $careerEntry['description'] ?? 'N/A' !!}<br><br>
                    </div>
                @endforeach
            @else
                <p>No career history available</p>
            @endif


            {{-- Applicant's Education --}}
            <p><strong>Education History</strong></p>
            @if (!empty($education) && is_array($education))
                @foreach ($education as $educationEntry)
                    <div class="border-2 border-red-600/50 rounded p-2 my-3">

                        <strong>Institution:</strong> {{ $educationEntry['institution'] }}<br>
                        <strong>Qualification:</strong> {{ $educationEntry['qualification'] }}<br>
                        <strong>Graduation Year:</strong>
                        {{ \Carbon\Carbon::parse($educationEntry['grad_year'])->format('F Y') }}<br>
                        <strong>Description:</strong> {!! $educationEntry['edu_description'] ?? 'N/A' !!}<br><br>
                    </div>
                @endforeach
            @else
                <p>No Education history available</p>
            @endif


            {{-- Applicant's License --}}
            <p><strong>Licenses </strong></p>
            @if (!empty($license) && is_array($license))
                @foreach ($license as $licenseEntry)
                    <div class="border-2 border-red-600/50 rounded p-2 my-3">

                        <strong>License Name:</strong> {{ $licenseEntry['license_name'] }}<br>
                        <strong>Issued By:</strong> {{ $licenseEntry['issuing_org'] }}<br>
                        <strong>Issued Date:</strong>
                        {{ \Carbon\Carbon::parse($licenseEntry['issued_date'])->format('F Y') }}<br>
                        <strong>Expiry Date:</strong>
                        {{ date('F Y', strtotime($licenseEntry['exp_date'])) ?? 'Does not Expire' }}<br>
                        <strong>Description:</strong> {!! $licenseEntry['description'] ?? 'N/A' !!}<br><br>
                    </div>
                @endforeach
            @else
                <p>No License history available</p>
            @endif

            {{-- Applicant's Skills --}}
            <p><strong>skills</strong></p>
            @if (!empty($skill) && is_array($skill))
                <div class="border-2 border-red-600/50 rounded p-2 my-3">

                    @foreach ($skill as $skillEntry)
                        <span> {{ $skillEntry['skill_name'] . '  ' }}</span>
                    @endforeach
                </div>
            @else
                <p>No skill available</p>
            @endif

            {{-- Applicant's languages --}}
            <p><strong>Languages</strong></p>
            @if (!empty($language) && is_array($language))
                <div class="border-2 border-red-600/50 rounded p-2 my-3">

                    @foreach ($language as $languageEntry)
                        <span> {{ $languageEntry['language'] . '  ' }}</span>
                    @endforeach
                </div>
            @else
                <p>No language available</p>
            @endif
        </div>

    </section>
    <script>
        function openStatus() {
            document.getElementById('status').classList.remove('hidden');
        }

        function closeStatus() {
            document.getElementById('status').classList.add('hidden');
        }
    </script>
@endsection
