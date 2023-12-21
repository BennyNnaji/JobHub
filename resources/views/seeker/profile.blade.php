@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        @php
            $user = Auth::guard('seeker')->user();
        @endphp
        <div class="bg-gray-400 elevation-10 rounded-t  w-10/12 mx-auto py-5 px-3 my-2">
            <h3 class="text-2xl font-semibold tracking-wide">{{ $user->name }}</h3>
            <a href="mailto:{{ $user->email }}" class="text-sm text-gray-200 my-2 italic block "><i
                    class="fa-regular fa-envelope"></i> {{ $user->email }}</a>
            <a href="tel:{{ $user->phone }}" class="text-sm text-gray-200 my-2 italic block"> <i
                    class="fa-solid fa-mobile-button"></i> {{ $user->phone }}</a>
            <p class="text-sm text-gray-200 my-2 italic block"><i class="fa-solid fa-location-dot"></i> Lagos, Nigeria</p>
        </div>

        <div class="md:flex justify-between mx-auto md:w-10/12">
            <div class="md:w-4/6">
                <div class="w-">
                    <div class="elevation-10 p-5 rounded bg-white mb-2 md:w-11/12">
                        <h2 class="text-lg text-gray-400">Profile Summary</h2>
                        <p class="font-medium break-words leading-normal pt-2 border-2 border-gray-300 p-2 rounded-lg ">
                            {!! nl2br($user->summary) !!}
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt minus sed dolorem beatae
                            adipisci,
                            accusantium sint autem nisi, sit dolorum perferendis officia libero tenetur enim, nulla dolor
                            quas est doloribus.
                        </p>




                    </div>
                    {{-- Career --}}
                    <div class="elevation-10 p-5 rounded bg-white my-2 md:w-11/12">
                        <h2 class="text-lg text-gray-400">Career History</h2>
                        <p class="font-medium break-words leading-normal pt-2 border-2 border-gray-300 p-2 rounded-lg ">
                            {!! nl2br($user->summary) !!}
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt minus sed dolorem beatae
                            adipisci,
                            accusantium sint autem nisi, sit dolorum perferendis officia libero tenetur enim, nulla dolor
                            quas est doloribus.
                        </p>

{{-- Modal --}}
 <div class="z-10 relative flex items-center justify-start" x-data="{ open: false }">
                        <div class=" flex justify-start ">
                            <button @click="open = true"
                                class="my-2 rounded-lg bg-green-50 px-5 py-2.5 text-sm font-medium text-green-500 hover:bg-green-100 hover:text-green-600">
                                <i class="fa-solid fa-plus"></i> Add Career </button>
                        </div>
                        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            x-description="Background backdrop, show/hide based on modal state."
                            class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"></div>


                        <div class="fixed overflow-y-auto">
                            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                                <div x-show="open" x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-description="Modal panel, show/hide based on modal state."
                                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                                    @click.away="open = false">
                                    <div class="p-4 sm:p-10 text-center overflow-y-auto min-h-screen relative z-20">



                                        <h3 class="mb-2 text-2xl font-bold text-gray-800">
                                            Add Career
                                        </h3>
                                        <div class="text-left w-full">
                                            <form action="" method="post">
                                                <label for="position" class="block text-left">Position</label>
                                                <input type="text" name="position" id="position"
                                                    class="rounded p-3 w-full ">

                                                <label for="compqny" class="block text-left">Company</label>
                                                <input type="text" name="compqny" id="compqny"
                                                    class="rounded p-3 w-full ">

                                                <div class="flex w-full gap-x-9">
                                                    <div>
                                                        <label for="start_month" class="block text-left">Start</label>
                                                        <input type="month" name="start_month" id="start_month"
                                                            class="rounded p-3 w-full">
                                                    </div>
                                                    <div>
                                                        <label for="start_month" class="block text-left">Ended</label>
                                                        <input type="month" name="start_month" id="start_month"
                                                            class="rounded p-3 w-full">
                                                    </div>
                                                </div>

                                                <label for="" class="block text-left">Description <span
                                                        class="text-xs italic">(Optiona)</span></label>
                                                <textarea name="description" id="description" class="rounded p-3 w-full "></textarea>

                                            </form>
                                        </div>

                                        <div class="mt-6 flex justify-center gap-x-4">
                                            <a class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-green-500 text-green-200 shadow-sm align-middle hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-green-600 transition-all text-sm"
                                                href="javascript:;">
                                                Add Career
                                            </a>
                                            <button @click="open = false" type="button"
                                                class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- /Modal --}}
                    </div>
                   
                    {{-- Career Ended Here --}}

                    {{-- Education --}}
                    <div class="elevation-10 p-5 rounded bg-white my-2 md:w-11/12">
                        <h2 class="text-lg text-gray-400">Education History</h2>
                        <p class="font-medium break-words leading-normal pt-2 border-2 border-gray-300 p-2 rounded-lg ">
                            {!! nl2br($user->summary) !!}
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt minus sed dolorem beatae
                            adipisci,
                            accusantium sint autem nisi, sit dolorum perferendis officia libero tenetur enim, nulla dolor
                            quas est doloribus.
                        </p>

                    <div class=" relative flex items-center justify-start" x-data="{ open: false }">
                        <div class=" flex justify-start ">
                            <button @click="open = true"
                                class="my-2 rounded-lg bg-green-50 px-5 py-2.5 text-sm font-medium text-green-500 hover:bg-green-100 hover:text-green-600">
                                <i class="fa-solid fa-plus"></i> Add Education </button>
                        </div>
                        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            x-description="Background backdrop, show/hide based on modal state."
                            class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"></div>


                        <div class="fixed overflow-y-auto">
                            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                                <div x-show="open" x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-description="Modal panel, show/hide based on modal state."
                                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                                    @click.away="open = false">
                                    <div class="p-4 sm:p-10 text-center overflow-y-auto min-h-screen ">



                                        <h3 class="mb-2 text-2xl font-bold text-gray-800">
                                            Add Career
                                        </h3>
                                        <div class="text-left w-full">
                                            <form action="" method="post">
                                                <label for="position" class="block text-left">Position</label>
                                                <input type="text" name="position" id="position"
                                                    class="rounded p-3 w-full ">

                                                <label for="compqny" class="block text-left">Company</label>
                                                <input type="text" name="compqny" id="compqny"
                                                    class="rounded p-3 w-full ">

                                                <div class="flex w-full gap-x-9">
                                                    <div>
                                                        <label for="start_month" class="block text-left">Start</label>
                                                        <input type="month" name="start_month" id="start_month"
                                                            class="rounded p-3 w-full">
                                                    </div>
                                                    <div>
                                                        <label for="start_month" class="block text-left">Ended</label>
                                                        <input type="month" name="start_month" id="start_month"
                                                            class="rounded p-3 w-full">
                                                    </div>
                                                </div>

                                                <label for="" class="block text-left">Description <span
                                                        class="text-xs italic">(Optiona)</span></label>
                                                <textarea name="description" id="description" class="rounded p-3 w-full "></textarea>

                                            </form>
                                        </div>

                                        <div class="mt-6 flex justify-center gap-x-4">
                                            <a class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-green-500 text-green-200 shadow-sm align-middle hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-green-600 transition-all text-sm"
                                                href="javascript:;">
                                                Add Career
                                            </a>
                                            <button @click="open = false" type="button"
                                                class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    </div>

                    {{-- /Education --}}
                </div>
            </div>
            <div class="md:w-2/6 bg-slate-400 p-3">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur harum temporibus officiis nisi illo?
                Perferendis quis voluptas vel exercitationem voluptatem sunt libero veniam magni ea accusamus architecto
                molestiae perspiciatis repellat corrupti sapiente eum molestias ratione blanditiis, illum eveniet id sit
                est? Magni officia earum, perspiciatis aspernatur, quos amet sed obcaecati facilis aut, molestiae ad
                dolores. Eveniet officiis, iusto omnis perspiciatis aliquid id itaque molestiae soluta ex quis numquam?
                Soluta assumenda doloveniam blanditiis itaque asperiores incidunt molestias, rerum deleniti minus eos cumque
                error. Numquam sunt expedita ex consectetur, dolorem sequi deserunt labore totam hic temporibus quibusdam
                pariatur cumque unde accusamus provident rem. Praesentium maiores cum aperiam quia delectus molestias
                incidunt molestiae.
                <div x-data="{ open: false }">
                    <button x-on:click="open = true"
                        class="rounded-lg bg-blue-50 px-5 py-2.5 text-sm font-medium text-blue-500 hover:bg-blue-100 hover:text-blue-600">Show
                        Modal</button>

                    <div x-show="open" @click.away="open = false">
                        <!-- Your modal content goes here -->
                        Modal content here. Click outside to close.
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
