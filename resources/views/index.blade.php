@extends('layouts.app')
@section('content')
    <section class="w-11/12 md:w-5/6 mx-auto" id="body"
        style="background-image: url('https://cdn.pixabay.com/photo/2015/10/22/00/16/work-1000618_1280.jpg');">
        <div class="bg-red-600/30 h-screen flex items-center">
            <div class="md:w-3/6 w-11/12 mx-auto p-5 border-2 border-black text-center rounded bg-white/50">

                <form action="{{ route('jobs.search') }}" method="get" class="py-4 px-2">
                    <h2 class="text-xl text-left">Search Jobs</h2>
                    <input type="text" name="keyword" id="keyword " placeholder="Keyword" class="w-full">
                    <select name="category" id="category" class="w-full">
                        <option value="">Select Category...</option>
                        <option value="Construction and Architecture">Construction and Architecture</option>
                        <option value="Creative Arts and Design">Creative Arts and Design</option>
                        <option value="Customer Service">Customer Service</option>
                        <option value="Education and Training">Education and Training</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Environmental and Sustainability">Environmental and Sustainability</option>
                        <option value="Finance">Finance</option>
                        <option value="Government and Public Administration">Government and Public Administration</option>
                        <option value="Healthcare">Healthcare</option>
                        <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Legal">Legal</option>
                        <option value="Logistics and Transportation">Logistics and Transportation</option>
                        <option value="Manufacturing and Production">Manufacturing and Production</option>
                        <option value="Research and Development">Research and Development</option>
                        <option value="Retail">Retail</option>
                        <option value="Sales and Marketing">Sales and Marketing</option>
                        <option value="Social Services">Social Services</option>
                        <option value="Telecommunications">Telecommunications</option>
                    </select>
                    <input type="text" name="location" id="location" placeholder="Location" class="w-full">
                    <button type="submit"
                        class="w-full hover:bg-red-600 bg-red-500 text-white p-2 rounded mt-2">Search</button>
                </form>
            </div>
        </div>
    </section>
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
                            <p class="px-4 py-2 w-full rounded "> {{ $job->company->name }}</p>
                            <div>
                                <p>{!! Str::limit($job->job_description, 200, '...') !!}</p>
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
