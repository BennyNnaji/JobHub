@extends('admin.layouts.side_top_menu')
@section('content')
    @php
        $user = Auth::guard('admin')->user();
        $totalSeekers = \App\Models\Seeker::count();
        $totalCompanies = \App\Models\Company::count();
        $totalJobs = \App\Models\Job::count();
        $totalApplications = \App\Models\Application::count();
        $totalReportJobs = \App\Models\ReportJob::count();
        //$totalSavedJobs = \App\Models\SavedJob::count();
        //$totalMessages = \App\Models\Message::count();
        //$totalCompanySeekers = \App\Models\CompanySeeker::count();
    @endphp
    <div class="flex justify-between items-center  px-5 py-2 w-full">
        <div>
            <h1 class="text-xl font-bold">Dashboard</h1>
        </div>
        <div>
            <a href="{{ URL::previous() }}"><i class="fa-solid fa-circle-left fa-2x"></i></a>
        </div>

    </div>
    <h2 class="text-xl font-semibold">Welcome {{ $user->name }}</h2>
    <section class="md:flex min-w-full">
        <div class="rounded px-4 py-2 border-gray-400 border-2 m-2 md:w-2/4 "
            style="background-image: url('{{ asset('images/admin/bg1.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="">
                <h2 class="">Total Seekers</h2>
                <div class="flex justify-between items-center py-5">
                    <div>
                        <i class="fa-solid fa-users fa-2x"></i>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">{{ $totalSeekers }} </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded px-4 py-2 border-gray-400 border-2 m-2 md:w-2/4 "
            style="background-image: url('{{ asset('images/admin/bg7.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="">
                <h2 class="">Total Companies</h2>
                <div class="flex justify-between items-center py-5">
                    <div>
                        <i class="fa-solid fa-building fa-2x"></i>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">{{ $totalCompanies }} </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="md:flex min-w-full">
        <div class="rounded px-4 py-2 border-gray-400 border-2 m-2 md:w-2/4 "
            style="background-image: url('{{ asset('images/admin/bg8.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="">
                <h2 class="">Total Jobs</h2>
                <div class="flex justify-between items-center py-5">
                    <div>
                        <i class="fa-solid fa-briefcase fa-2x"></i>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">{{ $totalJobs }} </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded px-4 py-2 border-gray-400 border-2 m-2 md:w-2/4 "
            style="background-image: url('{{ asset('images/admin/bg4.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="">
                <h2 class="">Total Applications</h2>
                <div class="flex justify-between items-center py-5">
                    <div>
                        <i class="fa-solid fa-closed-captioning fa-2x"></i>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">{{ $totalApplications }} </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="md:flex min-w-full">
        <div class="rounded px-4 py-2 border-gray-400 border-2 m-2 md:w-2/4 "
            style="background-image: url('{{ asset('images/admin/bg5.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="">
                <h2 class="">Reported Jobs</h2>
                <div class="flex justify-between items-center py-5">
                    <div>
                        <i class="fa-solid fa-flag fa-2x"></i>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">{{ $totalReportJobs }} </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded px-4 py-2 border-gray-400 border-2 m-2 md:w-2/4 "
            style="background-image: url('{{ asset('images/admin/bg6.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="">
                <h2 class="">Active Jobs</h2>
                <div class="flex justify-between items-center py-5">
                    <div>
                        <i class="fa-solid fa-group-arrows-rotate fa-2x"></i>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">{{ $activeJob }} </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="py-2 overflow-x-auto">
            <h2 class="text-xl font-bold">Recent Jobs</h2>
            <table class="w-full">
                <thead>
                    <tr class="bg-black text-white text-left">
                        <th class="py-2 px-4 border-b">SN</th>
                        <th class="py-2 px-4 border-b">Title</th>
                        <th class="py-2 px-4 border-b">Company</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr class="{{ $loop->even ? 'bg-gray-300' : 'bg-gray-400' }} px-2">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $job->job_title }}</td>
                            <td>{{ $job->company->name }}</td>
                            <td>
                                @if ($job->job_status == 1)
                                    <span class="text-green-500"><i class="fa-solid fa-toggle-on"></i></span>
                                @else
                                    <span class="text-red-500"><i class="fa-solid fa-toggle-off"></i></span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin_job_show', $job->id) }}" class="text-blue-500"><i
                                        class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>


            </table>

        </div>
        {{ $jobs->links() }}
    </section>
@endsection
