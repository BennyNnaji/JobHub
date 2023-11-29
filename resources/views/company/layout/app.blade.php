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

<body>

    <section class="">
        <div class="flex justify-between bg-blue-600 items-center md:px-5 px-auto">
            {{-- logo here --}}
            <div class="md:w-2/12  w-4/12 ">
                <a href="{{ route('index') }}" class=""><img src="{{ asset('images/front/logo.png') }}"
                        class="md:w-11/12 w-5/6" /></a>
            </div>
            <div class="md:w-1/12  w-2/12 text-center ">
                <img src="https://dummyimage.com/150x150/000/fff" alt="Company Logo"
                    class="md:w-5/12 w-3/6 rounded-full mx-auto">
                <div class="text-white font-semibold capitalize">{{ $company->name }}</div>

            </div>

        </div>


    </section>

    <section class=" flex ">
        {{-- Vertical Menu --}}
        <div class="bg-blue-600 h-screen w-2/6 md:w-1/6 text-white px-5 flex justify-between">
            {{-- Mobile Icon --}}
            <div class="md:hidden order-2" id="button"><i
                    class="fa-solid fa-bars hover:bg-blue-600  hover:text-blue-200 text-blue-100  cursor-pointer"></i>
            </div>
            <div>
                {{-- mobile menu --}}
                <div class="bg-blue-600 md:hidden" id="hidden">
                    <a href="" class="block px-4 py-2 rounded hover:border-2 border-blue-400 my-3"><i
                            class="fa-regular fa-user "></i></a>
                    <a href="" class="block px-4 py-2 rounded hover:border-2 border-blue-400 my-3"><i
                            class="fa-regular fa-user"></i></a>
                    <a href="" class="block px-4 py-2 rounded hover:border-2 border-blue-400 my-3"><i
                            class="fa-regular fa-user "></i></a>
                </div>
                {{-- Desktop Menu --}}
                <div class="hidden md:block" id="desk_menu">
                    <a href="" class="block px-4 py-2 rounded hover:border-2 border-blue-400 my-3"><i
                            class="fa-regular fa-user "></i> Home</a>
                    <a href="" class="block px-4 py-2 rounded hover:border-2 border-blue-400 my-3"><i
                            class="fa-regular fa-user"></i> Home</a>
                    <a href="" class="block px-4 py-2 rounded hover:border-2 border-blue-400 my-3"><i
                            class="fa-regular fa-user "></i> Home</a>
                </div>
            </div>

        </div>

        <div class="w-5/6 p-2 bg-gray-300">
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
