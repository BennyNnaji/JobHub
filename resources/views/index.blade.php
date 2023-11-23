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

                    </select>
                    <input type="text" name="location" id="location" placeholder="Location" class="w-full">
                    <button type="submit" class="w-full hover:bg-blue-600 bg-blue-500 text-white p-2 rounded mt-2">Search</button>
                </form>
            </div>
        </div>
    </section>
    <section class="w-11/12 md:w-5/6 mx-auto">
        <h2 class="text-xl text-left">Latest Jobs</h2>
        <div class="bg-blue-600 h-1 w-8/12">&nbsp;</div>


        <div class="w-11/12 md:w-5/6 mx-auto grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 my-3">
            <!-- Dummy Grid -->
            <a href="">
                <div class="bg-gray-200 p-4 border-2 border-blue-600/50 rounded ">
                    <h2 class="text-lg text-left font-semibold">Senior Frontend Developer</h2>
                    <p class="text-xs italic text-gray-400">
                        <span>
                            <i class="fa-solid fa-location-dot"></i>Abuja, Nigeria
                        </span>
                        <span>
                            <i class="fa-solid fa-clock"></i> 2 days ago
                        </span>
                        <span>
                            <i class="fa-solid fa-money-bill"></i> $9/Hr
                        </span>
                    </p>
                    <p class="px-4 py-2 w-3/6 rounded "> Eric Ltd</p>
                    <div>
                        <ul class="list-disc list-inside text-sm italic ">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                        </ul>
                        <p class="bg-blue-600 text-white p-2 rounded my-2 w-3/6 text-center">Intern</p>
                    </div>
                </div>
            </a>
                <a href="">
                <div class="bg-gray-200 p-4 border-2 border-blue-600/50 rounded ">
                    <h2 class="text-lg text-left font-semibold">Senior Frontend Developer</h2>
                    <p class="text-xs italic text-gray-400">
                        <span>
                            <i class="fa-solid fa-location-dot"></i>Abuja, Nigeria
                        </span>
                        <span>
                            <i class="fa-solid fa-clock"></i> 2 days ago
                        </span>
                        <span>
                            <i class="fa-solid fa-money-bill"></i> $9/Hr
                        </span>
                    </p>
                    <p class="px-4 py-2 w-3/6 rounded "> Eric Ltd</p>
                    <div>
                        <ul class="list-disc list-inside text-sm italic ">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                        </ul>
                        <p class="bg-blue-600 text-white p-2 rounded my-2 w-3/6 text-center">Part-Time</p>
                    </div>
                </div>
            </a>
                <a href="">
                <div class="bg-gray-200 p-4 border-2 border-blue-600/50 rounded ">
                    <h2 class="text-lg text-left font-semibold">Senior Frontend Developer</h2>
                    <p class="text-xs italic text-gray-400">
                        <span>
                            <i class="fa-solid fa-location-dot"></i>Abuja, Nigeria
                        </span>
                        <span>
                            <i class="fa-solid fa-clock"></i> 2 days ago
                        </span>
                        <span>
                            <i class="fa-solid fa-money-bill"></i> $9/Hr
                        </span>
                    </p>
                    <p class="px-4 py-2 w-3/6 rounded "> Eric Ltd</p>
                    <div>
                        <ul class="list-disc list-inside text-sm italic ">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                        </ul>
                        <p class="bg-blue-600 text-white p-2 rounded my-2 w-3/6 text-center">Contract</p>
                    </div>
                </div>
            </a>
                <a href="">
                <div class="bg-gray-200 p-4 border-2 border-blue-600/50 rounded ">
                    <h2 class="text-lg text-left font-semibold">Senior Frontend Developer</h2>
                    <p class="text-xs italic text-gray-400">
                        <span>
                            <i class="fa-solid fa-location-dot"></i>Abuja, Nigeria
                        </span>
                        <span>
                            <i class="fa-solid fa-clock"></i> 2 days ago
                        </span>
                        <span>
                            <i class="fa-solid fa-money-bill"></i> $9/Hr
                        </span>
                    </p>
                    <p class="px-4 py-2 w-3/6 rounded "> Eric Ltd</p>
                    <div>
                        <ul class="list-disc list-inside text-sm italic ">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                        </ul>
                        <p class="bg-blue-600 text-white p-2 rounded my-2 w-3/6 text-center">Full-Time</p>
                    </div>
                </div>
            </a>
                <a href="">
                <div class="bg-gray-200 p-4 border-2 border-blue-600/50 rounded ">
                    <h2 class="text-lg text-left font-semibold">Senior Frontend Developer</h2>
                    <p class="text-xs italic text-gray-400">
                        <span>
                            <i class="fa-solid fa-location-dot"></i>Abuja, Nigeria
                        </span>
                        <span>
                            <i class="fa-solid fa-clock"></i> 2 days ago
                        </span>
                        <span>
                            <i class="fa-solid fa-money-bill"></i> $9/Hr
                        </span>
                    </p>
                    <p class="px-4 py-2 w-3/6 rounded "> Eric Ltd</p>
                    <div>
                        <ul class="list-disc list-inside text-sm italic ">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                        </ul>
                        <p class="bg-blue-600 text-white p-2 rounded my-2 w-3/6 text-center">Contract</p>
                    </div>
                </div>
            </a>
                <a href="">
                <div class="bg-gray-200 p-4 border-2 border-blue-600/50 rounded ">
                    <h2 class="text-lg text-left font-semibold">Senior Frontend Developer</h2>
                    <p class="text-xs italic text-gray-400">
                        <span>
                            <i class="fa-solid fa-location-dot"></i>Abuja, Nigeria
                        </span>
                        <span>
                            <i class="fa-solid fa-clock"></i> 2 days ago
                        </span>
                        <span>
                            <i class="fa-solid fa-money-bill"></i> $9/Hr
                        </span>
                    </p>
                    <p class="px-4 py-2 w-3/6 rounded "> Eric Ltd</p>
                    <div>
                        <ul class="list-disc list-inside text-sm italic ">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                        </ul>
                        <p class="bg-blue-600 text-white p-2 rounded my-2 w-3/6 text-center">Full-Time</p>
                    </div>
                </div>
            </a>
                <a href="">
                <div class="bg-gray-200 p-4 border-2 border-blue-600/50 rounded ">
                    <h2 class="text-lg text-left font-semibold">Senior Frontend Developer</h2>
                    <p class="text-xs italic text-gray-400">
                        <span>
                            <i class="fa-solid fa-location-dot"></i>Abuja, Nigeria
                        </span>
                        <span>
                            <i class="fa-solid fa-clock"></i> 2 days ago
                        </span>
                        <span>
                            <i class="fa-solid fa-money-bill"></i> $9/Hr
                        </span>
                    </p>
                    <p class="px-4 py-2 w-3/6 rounded "> Eric Ltd</p>
                    <div>
                        <ul class="list-disc list-inside text-sm italic ">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                        </ul>
                        <p class="bg-blue-600 text-white p-2 rounded my-2 w-3/6 text-center">Intern</p>
                    </div>
                </div>
            </a>
                <a href="">
                <div class="bg-gray-200 p-4 border-2 border-blue-600/50 rounded ">
                    <h2 class="text-lg text-left font-semibold">Senior Frontend Developer</h2>
                    <p class="text-xs italic text-gray-400">
                        <span>
                            <i class="fa-solid fa-location-dot"></i>Abuja, Nigeria
                        </span>
                        <span>
                            <i class="fa-solid fa-clock"></i> 2 days ago
                        </span>
                        <span>
                            <i class="fa-solid fa-money-bill"></i> $9/Hr
                        </span>
                    </p>
                    <p class="px-4 py-2 w-3/6 rounded "> Eric Ltd</p>
                    <div>
                        <ul class="list-disc list-inside text-sm italic ">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                        </ul>
                        <p class="bg-blue-600 text-white p-2 rounded my-2 w-3/6 text-center">Part-Time</p>
                    </div>
                </div>
            </a>
                <a href="">
                <div class="bg-gray-200 p-4 border-2 border-blue-600/50 rounded ">
                    <h2 class="text-lg text-left font-semibold">Senior Frontend Developer</h2>
                    <p class="text-xs italic text-gray-400">
                        <span>
                            <i class="fa-solid fa-location-dot"></i>Abuja, Nigeria
                        </span>
                        <span>
                            <i class="fa-solid fa-clock"></i> 2 days ago
                        </span>
                        <span>
                            <i class="fa-solid fa-money-bill"></i> $9/Hr
                        </span>
                    </p>
                    <p class="px-4 py-2 w-3/6 rounded "> Eric Ltd</p>
                    <div>
                        <ul class="list-disc list-inside text-sm italic ">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                        </ul>
                        <p class="bg-blue-600 text-white p-2 rounded my-2 w-3/6 text-center">Intern</p>
                    </div>
                </div>
            </a>
                <a href="">
                <div class="bg-gray-200 p-4 border-2 border-blue-600/50 rounded ">
                    <h2 class="text-lg text-left font-semibold">Senior Frontend Developer</h2>
                    <p class="text-xs italic text-gray-400">
                        <span>
                            <i class="fa-solid fa-location-dot"></i>Abuja, Nigeria
                        </span>
                        <span>
                            <i class="fa-solid fa-clock"></i> 2 days ago
                        </span>
                        <span>
                            <i class="fa-solid fa-money-bill"></i> $9/Hr
                        </span>
                    </p>
                    <p class="px-4 py-2 w-3/6 rounded "> Eric Ltd</p>
                    <div>
                        <ul class="list-disc list-inside text-sm italic ">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                        </ul>
                        <p class="bg-blue-600 text-white p-2 rounded my-2 w-3/6 text-center">Contract</p>
                    </div>
                </div>
            </a>
        
        </div>

    </section>
@endsection
