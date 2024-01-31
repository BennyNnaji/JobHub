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
    <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=657c6ebc3bcaed00121fcd7a&product=sop'
        async='async'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tiny.cloud/1/6216wbng5cbdfeqd1pkwh8m5hymacgkbzx3etbiache8b5sj/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class=" bg-gray-200">
    {{-- Preloader --}}
    @include('layouts.preloader')
    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}"
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "{{ session('error') }}"
            });
        </script>
    @endif
    <section data-aos="zoom-in">
        <section>
            <div class=" bg-red-500 py-3">
                <div class="w-11/12 md:w-5/6 mx-auto flex justify-between items-center">
                    <div class="flex items-center  justify-start">
                        <div class="md:w-2/12  w-4/12 border-2 border-white rounded bg-red-300 p-3">
                            <a href="{{ route('index') }}" class=""><img
                                    src="{{ asset('images/front/logo.png') }}" class="md:w-11/12 w-5/6" /></a>
                        </div>
                        <div class="hidden md:block sm:hidden">
                            <a href="{{ route('index') }}"
                                class="mx-2 rounded px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100"> <i
                                    class="fa-solid fa-house-chimney"></i> Home</a>
                            <a href="{{ route('about') }}"
                                class="mx-2 rounded px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100">About
                                Us</a>
                            <a href=""
                                class="mx-2 rounded px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100">Services</a>
                            <a href="{{ route('jobs') }}"
                                class="mx-2 rounded px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100">Jobs</a>
                            <a href=""
                                class="mx-2 rounded px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100">Companies</a>

                        </div>
                    </div>
                    <div class="">
                        <div class="md:hidden" id="button"><i
                                class="fa-solid fa-bars hover:bg-red-600  hover:text-red-200 text-red-100 fa-2x cursor-pointer"></i>
                        </div>
                        <div class="hidden md:block">

                            @auth('company')
                                <a href="{{ route('company_dashboard') }}"
                                    class="mx-2 rounded px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100">Dashboard</a>
                                @elseauth('seeker')
                                <div class="flex justify-between items-center">

                                    <div class="dropdown inline-block relative">
                                        <span
                                            class="mx-2 rounded px-6 py-5 hover:bg-red-600 hover:text-red-200 text-red-100 cursor-pointer ">
                                            <i class="fa-solid fa-user-tie fa-2x"></i>
                                        </span>
                                        <div class="dropdown-content absolute hidden bg-red-500   mt-2 pb-4">
                                            <div>
                                                <a href="{{ route('seeker_profile') }}"
                                                    class="block px-6 py-3 text-red-100 hover:bg-red-600 hover:text-red-200">Profile</a>
                                            </div>
                                            <div>
                                                <a href="{{ route('saved_jobs') }}"
                                                    class="block px-6 py-3 text-red-100 hover:bg-red-600 hover:text-red-200">Saved
                                                    Jobs</a>
                                            </div>
                                            <div>
                                                <a href="{{ route('seeker_profile') }}"
                                                    class="block px-6 py-3 text-red-100 hover:bg-red-600 hover:text-red-200">Notifications</a>

                                            </div>
                                            <div>
                                                <a href="{{ route('applied_jobs') }}"
                                                    class="block px-6 py-3 text-red-100 hover:bg-red-600 hover:text-red-200">Applied&nbsp;Jobs</a>
                                            </div>
                                            <div>
                                                <a href="{{ route('seeker_profile') }}"
                                                    class="block px-6 py-3 text-red-100 hover:bg-red-600 hover:text-red-200">Password</a>
                                            </div>
                                            <div class="">
                                                <form action="{{ route('seeker_logout') }}" method="post" class="">
                                                    @csrf
                                                    <button type="submit"
                                                        class="w-full text-left px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100 block">Logout
                                                    </button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @else
                                <a href="{{ route('login') }}"
                                    class="mx-2 rounded px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100">Login</a><a
                                    href="{{ route('register') }}"
                                    class="mx-2 rounded px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100">Register</a>
                            @endauth
                        </div>

                    </div>
                </div>
                <div class="hidden sm:hidden" id="mobile_menu">
                    <a href="{{ route('index') }}"
                        class="mx-2 rounded block px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100">Home</a>
                    <a href="{{ route('about') }}"
                        class="mx-2 rounded block px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100">About
                        Us</a>
                    <a href=""
                        class="mx-2 rounded block px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100">Services</a>
                    <a href="{{ route('jobs') }}"
                        class="mx-2 rounded block px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100">Jobs</a>
                    <a href=""
                        class="mx-2 rounded block px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100">Companies</a>
                    <div class="flex justify-between w-8/12 mx-auto my-4">
                        @auth('company')
                            <a href="{{ route('company.dashboard') }}"
                                class="mx-2 rounded px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100">Dashboard</a>
                            @elseauth('seeker')
                            <a href="{{ route('seeker_profile') }}"
                                class="mx-2 rounded px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100">Profile</a>

                            <form action="{{ route('seeker_logout') }}" method="post" class="">
                                @csrf
                                <input type="submit" value="Logout"
                                    class="mx-2 rounded px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100 border-2 border-red-100 cursor-pointer">

                            </form>
                        @else
                            <a href="{{ route('login') }}"
                                class="mx-2 rounded px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100 border-2 border-red-100">Login</a><a
                                href="{{ route('register') }}"
                                class="mx-2 rounded px-6 py-3 hover:bg-red-600 hover:text-red-200 text-red-100 ">Register</a>
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
                    <a href="{{ route('index') }}"
                        class=" rounded block px-6 py-3 hover:bg-white text-black">Home</a>
                    <a href="" class=" rounded block px-6 py-3 hover:bg-white text-black">About
                        Us</a>
                    <a href="" class=" rounded block px-6 py-3 hover:bg-white text-black">Services</a>
                    <a href="{{ route('jobs') }}" class=" rounded block px-6 py-3 hover:bg-white text-black">Jobs</a>
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
                                    class="fa-brands fa-facebook fa-2x text-[#1877F2]"> </i></a>
                            <a href="https://twitter.com/BennyNnaji" target="_blank"><i
                                    class="fa-brands fa-twitter fa-2x text-[#1DA1F2]"> </i></a>
                            <a href="https://instagram.com/BennyNnaji" target="_blank"><i
                                    class="fa-brands fa-instagram fa-2x text-[#cd486b]"></i></a>
                            <a href="https://ng.linkedin.com/BennyNnaji" target="_blank"><i
                                    class="fa-brands fa-linkedin fa-2x text-[#0077b5]"></i></a>
                            <a href="https://wa.me/2348103938317" target="_blank"><i
                                    class="fa-brands fa-whatsapp fa-2x text-[#128c7e]"> </i></a>


                    </div>

                </div>
            </div>
            <div class="bg-black text-white text-center capitalize p-2 ">
                Copyright &copy; @php echo date('Y');       @endphp {{ env('APP_NAME') }} | Designed By <a
                    href="https://github.com/BennyNnaji" target="_blank" class="text-red-400 font-semibold text-lg">
                    Benny</a>
            </div>
        </section>

    </section>
    <button id="scrollToTopBtn"
        class="hidden fixed bottom-5 right-5 bg-red-500 px-4 py-4 rounded-full cursor-pointer">
        <i class="fa-solid fa-chevron-up fa-2x text-red-200"></i>
    </button>
    <script>
        let button = document.getElementById('button');
        let mobile_menu = document.getElementById('mobile_menu');
        button.addEventListener('click', () => {
            mobile_menu.classList.toggle('hidden');
        });

        AOS.init();
    </script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });


        // JavaScript to toggle the profile dropdown visibility
        document.addEventListener('click', function(event) {
            var dropdown = document.querySelector('.dropdown');
            if (!dropdown.contains(event.target)) {
                var dropdownContent = document.querySelector('.dropdown-content');
                if (dropdownContent.classList.contains('hidden') === false) {
                    dropdownContent.classList.add('hidden');
                }
            }
        });

        document.querySelector('.dropdown').addEventListener('click', function() {
            var dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.classList.toggle('hidden');
        });

        //Scroll to top
        // Get the button element
        var scrollToTopBtn = document.getElementById("scrollToTopBtn");

        // Show the button when the user scrolls down 20px from the top of the document
        window.onscroll = function() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollToTopBtn.classList.remove("hidden");
            } else {
                scrollToTopBtn.classList.add("hidden");
            }
        };

        // Scroll to the top smoothly when the button is clicked
        scrollToTopBtn.onclick = function() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera

            // Smooth scrolling
            document.body.style.scrollBehavior = "smooth";
            document.documentElement.style.scrollBehavior = "smooth";

            // Reset scroll behavior after scrolling to the top
            setTimeout(function() {
                document.body.style.scrollBehavior = "auto";
                document.documentElement.style.scrollBehavior = "auto";
            }, 50000); 
        };
    </script>
</body>

</html>
