@extends('layouts.app')
@section('content')
<section class="w-11/12 md:w-5/6 mx-auto">
    <h2 class="text-xl text-left">Latest Jobs</h2>
    <div class="bg-red-600 h-1 w-8/12">&nbsp;</div>


    <div class="w-11/12 md:w-5/6 mx-auto grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 my-3">
        <!-- Dummy Grid -->
        @if (count($jobs) > 0)
            @foreach ($jobs as $job)
                <a href="{{ route('jobs.show', $job->id) }}">
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
                                <i class="fa-solid fa-money-bill"></i> ${{ $job->min_salary }} - ${{ $job->max_salary }}
                            </span>
                        </p>
                        <p class="px-4 py-2 w-full rounded "> {{ $job->company->name}}</p>
                        <div>
                        <p>{!!Str::limit($job->job_description, 200, '...')!!}</p>
                            <p class="bg-red-600 text-white p-2 rounded my-2 w-3/6 text-center">{{ $job->job_type }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
    



    </div>
            {{ $jobs->links() }}
        @else
            <div>No Job</div>
        @endif

</section>
@endsection