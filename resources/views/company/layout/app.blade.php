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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-600">

    <section class="">
        <div class="flex justify-between  items-center md:px-5 px-auto" data-aos="fade-down">
            {{-- logo here --}}
            <div class="md:w-2/12  w-4/12 hidden md:block">
                <a href="{{ route('index') }}" class=""><img src="{{ asset('images/front/logo.png') }}"
                        class="md:w-11/12 w-5/6" /></a>
            </div>
            {{-- Mobile Icon --}}
            <div class="md:hidden ml-5" id="button"><i
                    class="fa-solid fa-bars fa-2x   text-gray-100  cursor-pointer"></i>
            </div>
            <div class="md:w-1/12  w-2/12 text-center ">
                <img src="https://dummyimage.com/150x150/000/fff" alt="Company Logo"
                    class="md:w-5/12 w-3/6 rounded-full mx-auto">
                <div class="text-white font-semibold capitalize">{{ $company->name }}</div>
            </div>
        </div>
    </section>

    <section class=" flex  ">
        {{-- Desktop Menu --}}
        <div class="bg-gray-600  h-screen w-2/6 md:w-1/6 md:block hidden text-white px-5 relative z-10 md:static"
            id="desk_menu" data-aos="fade-right">
            <div>
                <div> <a href="" class="block px-4 py-2 rounded hover:border-2 border-gray-400 my-3"><i
                            class="fa-regular fa-user "></i> Home</a> </div>
                <a href="" class="block px-4 py-2 rounded hover:border-2 border-gray-400 my-3"><i
                        class="fa-regular fa-user"></i> Home</a>
                <a href="" class="block px-4 py-2 rounded hover:border-2 border-gray-400 my-3"><i
                        class="fa-regular fa-user "></i> Home</a>
            </div>
        </div>

        <div class="w-full p-2 bg-gray-200 absolute top-28 md:static inset-0 min-h-screen rounded-t-3xl border-t-4 border-x-4 md:border-red-500 border-gray-600"
            data-aos="flip-right">
            @yield('content')
        </div>
    </section>

    <script>
        let button = document.getElementById('button');
        let mobile_menu = document.getElementById('desk_menu');
        button.addEventListener('click', () => {
            mobile_menu.classList.toggle('hidden');
        });
        AOS.init();
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
</body>


</html>
