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
    {{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tiny.cloud/1/6216wbng5cbdfeqd1pkwh8m5hymacgkbzx3etbiache8b5sj/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
</head>

<body class="bg-gray-600">
    {{-- Preloader --}}
    @include('layouts.preloader')

    @php
        $company = Auth::guard('company')->user();
    @endphp
    <section class="">
        <div class="flex justify-between  items-center md:px-5 px-auto" data-aos="fade-down">
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


            <div class="md:w-1/12 w-2/12 relative ">
                <button class="flex flex-col items-center justify-center w-full h-full focus:outline-none"
                    id="dropdownBtn">
                    <img src="{{ asset('storage/company/Images/' . $company->logo) }}" alt="Company Logo"
                        class="md:w-5/12 w-3/6 rounded-full mx-auto">
                    <div class="text-white font-semibold capitalize text-center">{{ $company->name }}</div>
                </button>
                {{-- Profile Dropdown --}}
                <div class="absolute hidden bg-white text-gray-800 shadow-md rounded-md mt-2 space-y-2 right-0 -z-50"
                    id="dropdownContent">
                    <a href="{{ route('company_dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                    <a href="{{ route('company_profile') }}" class="block px-4 py-2 hover:bg-gray-100">My Profile</a>
                    <form action="{{ route('company_logout') }}" method="post" class="block px-4 py-2">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>





        </div>
    </section>





    <section class=" flex  ">

        {{-- Desktop Menu --}}
        <div class="bg-gray-600  h-screen w-2/6 md:w-1/6 md:block hidden text-white px-5 relative z-30 md:static"
            id="desk_menu" data-aos="fade-right">
            <div>
                <a href="{{ route('company_dashboard') }}"
                    class="block px-4 py-2 rounded hover:border-2 border-gray-400 my-3"><i
                        class="fa-solid fa-gauge-high"></i> Dashboard</a>

                <a href="{{ route('company_profile') }}"
                    class="block px-4 py-2 rounded hover:border-2 border-gray-400 my-3"><i
                        class="fa-solid fa-user "></i> My Profile</a>

                <a href="{{ route('company_jobs') }}"
                    class="block px-4 py-2 rounded hover:border-2 border-gray-400 my-3"><i
                        class="fa-solid fa-briefcase"></i> Jobs</a>
                <a href="{{ route('company_jobs.add') }}"
                    class="block px-4 py-2 rounded hover:border-2 border-gray-400 my-3"><i
                        class="fa-solid fa-briefcase"></i> Add Jobs</a>
                <a href="{{ route('company_applications') }}"
                    class="block px-4 py-2 rounded hover:border-2 border-gray-400 my-3"><i
                        class="fa-solid fa-briefcase"></i> Applications</a>

                        <a href="{{ route('company_messages') }}"
                        class="block px-4 py-2 rounded hover:border-2 border-gray-400 my-3">   <i class="fa-solid fa-comment-dots"></i> Messages</a>
                <form action="{{ route('company_logout') }}" method="post" class="block px-4 py-2">
                    @csrf
                    <button type="submit"> <i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                </form>
             

            </div>




        </div>
        {{-- Main Content --}}
        <div class="w-full p-2 bg-gray-200 absolute z-10  md:static min-h-screen rounded-t-3xl border-t-4 border-x-4 md:border-red-500 border-gray-600"
            data-aos="flip-right">

            @yield('content')
        </div>

        
        <button id="scrollToTopBtn"
            class="hidden fixed bottom-5 right-5 bg-red-500 px-4 py-4 rounded-full cursor-pointer">
            <i class="fa-solid fa-chevron-up fa-2x text-red-200"></i>
        </button>
    </section>
    <script>
        let button = document.getElementById("dropdownBtn");
        let profile = document.getElementById("dropdownContent");


        button.addEventListener("click", () => {
            profile.classList.toggle("hidden");
        });
    </script>
    <script>
        let button1 = document.getElementById('button');
        let mobile_menu = document.getElementById('desk_menu');
        button1.addEventListener('click', () => {
            mobile_menu.classList.toggle('hidden');
        });
    </script>
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
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });


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
