@extends('layouts.app')
@section('content')
    <section class="md:flex w-11/12 md:w-5/6 mx-auto">
        <div class="md:w-3/5 mb-5">
            <form action="" method="post">
                <div class="bg-red-600 p-3 text-white font-bold ">Job Details</div>
                <div class="flex justify-between">
                    <div class=" flex justify-start space-x-2 items-center my-2">
                        <div class="h-10 w-10 rounded-full "><img
                                src="{{ asset('storage/company/Images/' . $job->company->logo) }}" alt="Company logo"></div>
                        <div class="text-2xl mx-2">{{ $job->company->name }}</div>
                    </div>
                    <div class="my-2">
                        <p class="cursor-pointer bg-green-500 px-3 py-2 rounded-t text-white my-1"> <i class="fa-solid fa-heart"></i> Save</p>
                        <p class="cursor-pointer bg-yellow-500 px-3 py-2 rounded-b text-white my-1"> <i class="fa-solid fa-triangle-exclamation"></i> Report</p>
                    </div>
                </div>
                <h2 class="font-semibold ">{{ $job->job_title }}</h2>
                <div>
                    <span class="block"><i class="fa-solid fa-location-dot"></i> {{ $job->job_location }}</span>
                    <span class="block"><i class="fa-solid fa-layer-group"></i> {{ $job->job_category }}</span>
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


                @if (!Auth::guard('company'))
                    <button type="submit"
                    class="w-2/6 bg-red-500 rounded px-6 py-3 hover:bg-red-600 text-center text-red-200 hover:text-red-200">Apply
                    Now</button>
                @endif
            </form>
            <div>
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
            <div class="bg-red-600 p-3 text-white">Related Jobs</div>
            <div class="my-3">
                <a href="{{ route('jobs.show', $job->id) }}">
                    <div class="bg-gray-200 p-4 border-2 border-red-600/50 rounded ">
                        <h2 class="text-lg text-left font-semibold">Human Resource Manager</h2>
                        <p class="text-xs italic text-gray-400">
                            <span>
                                <i class="fa-solid fa-location-dot"></i>Lagos, Nigeria
                            </span>
                            <span>
                                <i class="fa-solid fa-clock"></i> 2 Days Ago
                            </span>
                            <span>
                                <i class="fa-solid fa-money-bill"></i> $40,000 - $59,000
                            </span>
                        </p>
                        <p class="px-4 py-2 w-3/6 rounded ">Ezenwa Groups</p>
                        <div>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto doloribus ex nulla. Expedita
                                quas iusto omnis animi quasi nostrum, nisi obcaecati tempore! Voluptatibus soluta at
                                numquam. Magni libero atque ab quibusdam fugit alias, sint nostrum? Sit aliquam magni, natus
                                repudiandae laboriosam dolore maiores, ex culpa reprehenderit fugit hic quaerat facere?</p>
                            <p class="bg-red-600 text-white p-2 rounded my-2 w-3/6 text-center">Internship</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="my-3">
                <a href="{{ route('jobs.show', $job->id) }}">
                    <div class="bg-gray-200 p-4 border-2 border-red-600/50 rounded ">
                        <h2 class="text-lg text-left font-semibold">Human Resource Manager</h2>
                        <p class="text-xs italic text-gray-400">
                            <span>
                                <i class="fa-solid fa-location-dot"></i>Lagos, Nigeria
                            </span>
                            <span>
                                <i class="fa-solid fa-clock"></i> 2 Days Ago
                            </span>
                            <span>
                                <i class="fa-solid fa-money-bill"></i> $40,000 - $59,000
                            </span>
                        </p>
                        <p class="px-4 py-2 w-3/6 rounded ">Ezenwa Groups</p>
                        <div>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto doloribus ex nulla. Expedita
                                quas iusto omnis animi quasi nostrum, nisi obcaecati tempore! Voluptatibus soluta at
                                numquam. Magni libero atque ab quibusdam fugit alias, sint nostrum? Sit aliquam magni, natus
                                repudiandae laboriosam dolore maiores, ex culpa reprehenderit fugit hic quaerat facere?</p>
                            <p class="bg-red-600 text-white p-2 rounded my-2 w-3/6 text-center">Internship</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="my-3">
                <a href="{{ route('jobs.show', $job->id) }}">
                    <div class="bg-gray-200 p-4 border-2 border-red-600/50 rounded ">
                        <h2 class="text-lg text-left font-semibold">Human Resource Manager</h2>
                        <p class="text-xs italic text-gray-400">
                            <span>
                                <i class="fa-solid fa-location-dot"></i>Lagos, Nigeria
                            </span>
                            <span>
                                <i class="fa-solid fa-clock"></i> 2 Days Ago
                            </span>
                            <span>
                                <i class="fa-solid fa-money-bill"></i> $40,000 - $59,000
                            </span>
                        </p>
                        <p class="px-4 py-2 w-3/6 rounded ">Ezenwa Groups</p>
                        <div>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto doloribus ex nulla. Expedita
                                quas iusto omnis animi quasi nostrum, nisi obcaecati tempore! Voluptatibus soluta at
                                numquam. Magni libero atque ab quibusdam fugit alias, sint nostrum? Sit aliquam magni, natus
                                repudiandae laboriosam dolore maiores, ex culpa reprehenderit fugit hic quaerat facere?</p>
                            <p class="bg-red-600 text-white p-2 rounded my-2 w-3/6 text-center">Internship</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="my-3">
                <a href="{{ route('jobs.show', $job->id) }}">
                    <div class="bg-gray-200 p-4 border-2 border-red-600/50 rounded ">
                        <h2 class="text-lg text-left font-semibold">Human Resource Manager</h2>
                        <p class="text-xs italic text-gray-400">
                            <span>
                                <i class="fa-solid fa-location-dot"></i>Lagos, Nigeria
                            </span>
                            <span>
                                <i class="fa-solid fa-clock"></i> 2 Days Ago
                            </span>
                            <span>
                                <i class="fa-solid fa-money-bill"></i> $40,000 - $59,000
                            </span>
                        </p>
                        <p class="px-4 py-2 w-3/6 rounded ">Ezenwa Groups</p>
                        <div>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto doloribus ex nulla. Expedita
                                quas iusto omnis animi quasi nostrum, nisi obcaecati tempore! Voluptatibus soluta at
                                numquam. Magni libero atque ab quibusdam fugit alias, sint nostrum? Sit aliquam magni, natus
                                repudiandae laboriosam dolore maiores, ex culpa reprehenderit fugit hic quaerat facere?</p>
                            <p class="bg-red-600 text-white p-2 rounded my-2 w-3/6 text-center">Internship</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="my-3">
                <a href="{{ route('jobs.show', $job->id) }}">
                    <div class="bg-gray-200 p-4 border-2 border-red-600/50 rounded ">
                        <h2 class="text-lg text-left font-semibold">Human Resource Manager</h2>
                        <p class="text-xs italic text-gray-400">
                            <span>
                                <i class="fa-solid fa-location-dot"></i>Lagos, Nigeria
                            </span>
                            <span>
                                <i class="fa-solid fa-clock"></i> 2 Days Ago
                            </span>
                            <span>
                                <i class="fa-solid fa-money-bill"></i> $40,000 - $59,000
                            </span>
                        </p>
                        <p class="px-4 py-2 w-3/6 rounded ">Ezenwa Groups</p>
                        <div>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto doloribus ex nulla. Expedita
                                quas iusto omnis animi quasi nostrum, nisi obcaecati tempore! Voluptatibus soluta at
                                numquam. Magni libero atque ab quibusdam fugit alias, sint nostrum? Sit aliquam magni, natus
                                repudiandae laboriosam dolore maiores, ex culpa reprehenderit fugit hic quaerat facere?</p>
                            <p class="bg-red-600 text-white p-2 rounded my-2 w-3/6 text-center">Internship</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </section>
@endsection
