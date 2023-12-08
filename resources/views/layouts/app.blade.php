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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body class=" bg-gray-200">
    <section data-aos="zoom-in">
        <section>
            <div class=" bg-blue-500 py-3">
                <div class="w-11/12 md:w-5/6 mx-auto flex justify-between items-center">
                    <div class="flex items-center  justify-start">
                        <div class="md:w-2/12  w-4/12">
                            <a href="{{ route('index') }}" class=""><img
                                    src="{{ asset('images/front/logo.png') }}" class="md:w-11/12 w-5/6" /></a>
                        </div>
                        <div class="hidden md:block sm:hidden">
                            <a href=""
                                class="mx-2 rounded px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Home</a>
                            <a href=""
                                class="mx-2 rounded px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">About
                                Us</a>
                            <a href=""
                                class="mx-2 rounded px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Services</a>
                            <a href=""
                                class="mx-2 rounded px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Jobs</a>
                            <a href=""
                                class="mx-2 rounded px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Companies</a>
                        </div>
                    </div>
                    <div class="">
                        <div class="md:hidden" id="button"><i
                                class="fa-solid fa-bars hover:bg-blue-600  hover:text-blue-200 text-blue-100 fa-2x cursor-pointer"></i>
                        </div>
                        <div class="hidden md:block">

                            @auth
                                @if (Auth::guard('company')->user())
                                    <a href="{{ route('company.dashboard') }}"
                                        class="mx-2 rounded px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Dashboard</a>
                                @else
                                    <a href="{{ route('seeker.dashboard') }}"
                                        class="mx-2 rounded px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Dashboard</a>
                                @endif
                            @endauth
                            @guest
                                <a href="{{ route('login') }}"
                                    class="mx-2 rounded px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Login</a><a
                                    href="{{ route('register') }}"
                                    class="mx-2 rounded px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Register</a>
                            @endguest
                        </div>

                    </div>
                </div>
                <div class="hidden" id="mobile_menu">
                    <a href=""
                        class="mx-2 rounded block px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Home</a>
                    <a href=""
                        class="mx-2 rounded block px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">About
                        Us</a>
                    <a href=""
                        class="mx-2 rounded block px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Services</a>
                    <a href=""
                        class="mx-2 rounded block px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Jobs</a>
                    <a href=""
                        class="mx-2 rounded block px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Companies</a>
                    <div class="flex justify-between w-8/12 mx-auto my-4">

                        @auth
                            @if (Auth::guard('company')->user())
                                <a href="{{ route('company.dashboard') }}"
                                    class="mx-2 rounded px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Dashboard</a>
                            @else
                                <a href="{{ route('seeker.dashboard') }}"
                                    class="mx-2 rounded px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Dashboard</a>
                            @endif
                        @else
                      
                            <a href="{{ route('login') }}"
                                class="mx-2 rounded px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Login</a><a
                                href="{{ route('register') }}"
                                class="mx-2 rounded px-6 py-3 hover:bg-blue-600 hover:text-blue-200 text-blue-100">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </section>

        @yield('content')
        <section class="bg-black/50">
            <div class="w-11/12 md:w-5/6 mx-auto md:flex justify-between py-6">
                <div class="md:w-3/6" data-aos="zoom-in-left">
                    <h2 class="font-semibold text-white">About</h2>
                    <hr class="w-4/5 my-2">
                    <img src="{{ asset('images/front/logo.png') }}" alt="" class="inline w-3/6"> <span
                        class="text-justify"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci,
                        ducimus!
                        Accusantium vero rem earum eos, consequatur tenetur repellendus fuga ipsa id, architecto esse
                        quisquam minima, ad culpa illo ratione debitis.</span>
                </div>

                <div class="md:w-3/6" data-aos="zoom-in">
                    <h2 class="font-semibold text-white">Navigation</h2>
                    <hr class="w-4/5 my-2">
                    <a href="" class=" rounded block px-6 py-3 hover:bg-white text-black">Home</a>
                    <a href="" class=" rounded block px-6 py-3 hover:bg-white text-black">About
                        Us</a>
                    <a href="" class=" rounded block px-6 py-3 hover:bg-white text-black">Services</a>
                    <a href="" class=" rounded block px-6 py-3 hover:bg-white text-black">Jobs</a>
                </div>

                <div class="md:w-3/6" data-aos="zoom-in-right">
                    <h2 class="font-semibold text-white">Contact</h2>
                    <hr class="w-4/5 my-2">
                    <p class="my-5"><i class="fa-solid fa-phone"></i> +234 813 123 4567</p>
                    <p class="my-5"><i class="fa-solid fa-envelope"></i> <a
                            href="mailto:5HbqN@example.com">info@jobhubs.com</a></p>
                    <p class="my-5"><i class="fa-solid fa-location-dot"></i> Choba, PH, Nigeria.</p>

                    <div>
                        <p class="my-5">
                            <a href="https://facebook.com/BennyNnaji" target="_blank"> <i
                                    class="fa-brands fa-facebook fa-2x"> </i></a>
                            <a href="https://twitter.com/BennyNnaji" target="_blank"><i
                                    class="fa-brands fa-twitter fa-2x"> </i></a>
                            <a href="https://instagram.com/BennyNnaji" target="_blank"><i
                                    class="fa-brands fa-instagram fa-2x"></i></a>
                            <a href="https://ng.linkedin.com/BennyNnaji" target="_blank"><i
                                    class="fa-brands fa-linkedin fa-2x"></i></a>
                            <a href="https://wa.me/2348103938317" target="_blank"><i
                                    class="fa-brands fa-whatsapp fa-2x"> </i></a>



                        </p>
                    </div>

                </div>
            </div>
            <div class="bg-black text-white text-center capitalize p-2 ">
                Copyright &copy; @php echo date('Y');       @endphp {{ env('APP_NAME') }} | Designed By <a
                    href="https://github.com/BennyNnaji" target="_blank" class="text-red-400 font-semibold text-lg">
                    Benny</a>
            </div>
        </section>
        <script>
            let button = document.getElementById('button');
            let mobile_menu = document.getElementById('mobile_menu');
            button.addEventListener('click', () => {
                mobile_menu.classList.toggle('hidden');
            });

            AOS.init();
        </script>
    </section>
</body>

</html>
