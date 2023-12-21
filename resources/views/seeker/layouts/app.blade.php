<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | {{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="{{ asset('images/front/fav.png') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}
    <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=657c6ebc3bcaed00121fcd7a&product=sop'
        async='async'></script>

</head>

<body class="bg-gray-600 ">
    @php
        $seeker = Auth::guard('seeker')->user();
    @endphp
    <section class=" ">
        <div class="flex justify-between px-4">
            <div class="flex justify-start items-center">


                {{-- logo here --}}
                <div class="md:w-2/12  w-4/12 md:block">
                    <a href="{{ route('index') }}" class=""><img src="{{ asset('images/front/logo.png') }}"
                            class="md:w-11/12 w-5/6" /></a>
                </div>
                {{-- Mobile Icon --}}
                <div class="md:hidden ml-5" id="button"><i
                        class="fa-solid fa-bars fa-2x   text-gray-100  cursor-pointer"></i>
                </div>
            </div>
            <div class="text-white">{{ $seeker->name }}</div>
        </div>
        <div class="flex ">
            <div class="bg-gray-600  h-screen w-2/6 md:w-1/6 md:block hidden text-white px-5 relative z-30 md:static py-0 md:py-5">
                <a href="" class="block">Dashboard</a>
                <a href="" class="block">Dashboard</a>
                <a href="" class="block">Dashboard</a>
                <a href="" class="block">Dashboard</a>
                <a href="" class="block">Dashboard</a>

            </div>
            {{-- Main Content --}}
            <div class="w-full p-2 bg-gray-200 absolute z-10  md:static min-h-screen rounded-t-3xl border-t-4 border-x-4 md:border-red-500 border-gray-600"
                data-aos="flip-right">
                @yield('content')
            </div>
        </div>
    </section>

</body>

</html>
