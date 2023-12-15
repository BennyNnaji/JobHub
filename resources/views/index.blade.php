@extends('layouts.app')
@section('content')
    <section class="w-11/12 md:w-5/6 mx-auto" id="body"
        style="background-image: url('https://cdn.pixabay.com/photo/2015/10/22/00/16/work-1000618_1280.jpg');">
        <div class="bg-red-600/30 h-screen flex items-center">
            <div class="md:w-3/6 w-11/12 mx-auto p-5 border-2 border-black text-center rounded bg-white/50">

                <form action="" method="get" class="py-4 px-2">
                    <h2 class="text-xl text-left">Search Jobs</h2>
                    <input type="text" name="keyword" id="keyword " placeholder="Keyword" class="w-full">
                    <select name="category" id="category" class="w-full">
                        <option value="">Category 1</option>
                        <option value="">Category 2</option>
                        <option value="">Category 3</option>
                        <option value="">Category 4</option>
                        <option value="">Category 5</option>
                        <option value="">Category 6</option>
                        <option value="">Category 7</option>
                    </select>
                    <input type="text" name="location" id="location" placeholder="Location" class="w-full">
                    <button type="submit"
                        class="w-full hover:bg-blue-600 bg-blue-500 text-white p-2 rounded mt-2">Search</button>
                </form>
            </div>
        </div>
    </section>
    <section class="w-11/12 md:w-5/6 mx-auto">
        <h2 class="text-xl text-left">Latest Jobs</h2>
        <div class="bg-blue-600 h-1 w-8/12">&nbsp;</div>


        <div class="w-11/12 md:w-5/6 mx-auto grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 my-3">
            <!-- Dummy Grid -->
            @if (count($jobs) > 0)
                @foreach ($jobs as $job)
                    <a href="{{ route('jobs.show', $job->id) }}">
                        <div class="bg-gray-200 p-4 border-2 border-blue-600/50 rounded ">
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
                            <p class="px-4 py-2 w-3/6 rounded "> {{ $job->company->name}}</p>
                            <div>
                            <p>{!!Str::limit($job->job_description, 200, '...')!!}</p>
                                <p class="bg-blue-600 text-white p-2 rounded my-2 w-3/6 text-center">{{ $job->job_type }}</p>
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
