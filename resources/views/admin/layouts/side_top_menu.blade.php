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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY
    crossorigin="anonymous"
        referrerpolicy="no-referrer" />
</head>

<body class="relative">
    {{-- Top Menu --}}
    <section class="flex justify-between items-center bg-blue-500 px-5 py-2">
        <div>
            <a href="{{ route('index') }}"><img src="{{ asset('images/front/logo.png') }}" alt="logo"
                    class="w-2/6"></a>
        </div>
        <div>
            <span><i class="fa-solid fa-user fa-2x rounded-full bg-white p-2"></i> </span> <span
                class="text-white capitalize text-md">{{ Auth::guard('admin')->name }} <i
                    class="fa-solid fa-angle-down"></i></span>
        </div>
    </section>

    {{-- Toggle Icon --}}
    <div class="block  cursor-pointer bg-blue-500 md:hidden" id="close"><i
            class="fa-solid fa-bars text-white ml-9"></i></div>

    <section class="flex min-w-full">

        {{-- Side Menu --}}
        <div class="bg-blue-500 text-white min-h-full  px-4 overflow-y-auto z-20 absolute left-0 hidden md:block md:relative  md:w-1/5 transition-all duration-700 ease-in-out"
            id="menu">
            <a href="{{ route('admin_dashboard') }}" class="my-4 hover:bg-blue-600 px-4 py-2 rounded block" title="Dashboard"><i
                    class="fa-solid fa-house "></i> <span class="">Dashboard</span> </a>
            <div class="relative group cursor-pointer my-4 hover:bg-blue-600/50 px-4 py-2 rounded block">
                <span class="flex justify-between items-center">
                    <div title="Seekers"> <i class="fa-solid fa-users "></i> Seekers </div>
                    <div><i class="fa-solid fa-angle-down"></i></div>
                </span>
                <ul class=" left-0 top-full hidden group-hover:block transition duration-700 ease-in-out">
                    <li>
                        <a href="{{ route('admin_seekers') }}" class="my-2 hover:bg-blue-600 px-4 py-2 rounded block w-full"> All Seekers</a>
                    </li>
                    <li>
                        <a href="{{ route('admin_seekers_active') }}" class="my-2 hover:bg-blue-600 px-4 py-2 rounded block w-full"> Active
                            Seekers</a>
                    </li>
                    <li>
                        <a href="#" class="my-2 hover:bg-blue-600 px-4 py-2 rounded block w-full"> Verified
                            Seekers</a>
                    </li>
                    <li>
                        <a href="#" class="my-2 hover:bg-blue-600 px-4 py-2 rounded block w-full"> Unverified&nbsp;Seekers</a>
                    </li>

                </ul>
            </div>

            <div class="relative group cursor-pointer my-4 hover:bg-blue-600/50 px-4 py-2 rounded block">
                <span class="flex justify-between items-center">
                    <div title="Jobs"> <i class="fa-solid fa-briefcase "></i> Jobs </div>
                    <div><i class="fa-solid fa-angle-down"></i></div>
                </span>
                <ul class=" left-0 top-full hidden group-hover:block transition duration-700 ease-in-out">
                    <li>
                        <a href="{{ route('admin_jobs') }}" class="my-2 hover:bg-blue-600 px-4 py-2 rounded block w-full"> All Jobs</a>
                    </li>
                    <li>
                        <a href="{{ route('admin_jobs_active') }}" class="my-2 hover:bg-blue-600 px-4 py-2 rounded block w-full"> Active Jobs</a>
                    </li>
                    <li>
                        <a href="{{ route('admin_jobs_pending') }}" class="my-2 hover:bg-blue-600 px-4 py-2 rounded block w-full"> Pending
                            Jobs</a>
                    </li>
                    <li>
                        <a href="{{ route('admin_jobs_reported') }}" class="my-2 hover:bg-blue-600 px-4 py-2 rounded block w-full"> Reported
                            Jobs</a>
                    </li>
                    <li>
                        <a href="{{ route('admin_jobs_expired') }}" class="my-2 hover:bg-blue-600 px-4 py-2 rounded block w-full"> Expired
                            Jobs</a>
                    </li>
                    <li>
                        <a href="{{ route('admin_jobs_closed') }}" class="my-2 hover:bg-blue-600 px-4 py-2 rounded block w-full"> Closed
                            Jobs</a>
                    </li>

                </ul>
            </div>
            <a href="" class="my-4 hover:bg-blue-600 px-4 py-2 rounded block" title="Applications"><i
                    class="fa-solid fa-briefcase"></i> <span class="">Applications</span> </a>

                    <div class="relative group cursor-pointer my-4 hover:bg-blue-600/50 px-4 py-2 rounded block">
                        <span class="flex justify-between items-center">
                            <div title="Companies"> <i class="fa-solid fa-building  "></i> Companies </div>
                            <div><i class="fa-solid fa-angle-down"></i></div>
                        </span>
                        <ul class=" left-0 top-full hidden group-hover:block transition duration-700 ease-in-out">
                            <li>
                                <a href="{{ route('admin_companies') }}" class="my-2 hover:bg-blue-600 px-4 py-2 rounded block w-full"> All Companies</a>
                            </li>
                            <li>
                                <a href="{{ route('admin_companies_active') }}" class="my-2 hover:bg-blue-600 px-4 py-2 rounded block w-full"> Active
                                    Companies</a>
                            </li>
                            <li>
                                <a href="{{ route('admin_companies_verified') }}" class="my-2 hover:bg-blue-600 px-4 py-2 rounded block w-full"> Verified&nbsp;Companies</a>
                            </li>
                            <li>
                                <a href="{{ route('admin_companies_unverified') }}" class="my-2 hover:bg-blue-600 px-4 py-2 rounded block w-full"> Unverified&nbsp;Companies</a>
                            </li>
        
                        </ul>
                    </div>
            <a href="" class="my-4 hover:bg-blue-600 px-4 py-2 rounded block" title="Messages"><i
                    class="fa-solid fa-envelope "></i> <span class="">Messages</span> </a>
            <a href="" class="my-4 hover:bg-blue-600 px-4 py-2 rounded block" title="Settings"><i
                    class="fa-solid fa-gear "></i> <span class="">Settings</span> </a>
            <a href="" class="my-4 hover:bg-blue-600 px-4 py-2 rounded block" title="Logout"><i
                    class="fa-solid fa-right-from-bracket "></i> <span class="">Logout</span> </a>
            <a href="" class="my-4 hover:bg-blue-600 px-4 py-2 rounded block" title="Profile"><i
                    class="fa-solid fa-user "></i> <span class="">Profile</span> </a>

            <p class="text-red-500 mt-40 absolute bottom-6">Desined By <a href="https://www.wa.me/2348103938317"
                    target="_blank" class="text-blue-700">Benny Nnaji</a></p>
        </div>

        {{-- Content --}}
        <div class="px-2 bg-slate-300 w-full relative z-0">
            @yield('content')

            <p class="text-center">Copyright &copy; @php echo date('Y'); @endphp | All Rights Reserved | {{ env('APP_NAME') }}
            </p>
        </div>
    </section>
    <script>
        var close = document.getElementById("close");
        var menu = document.getElementById("menu");

        // Toggle the sidebar on button click
        close.addEventListener("click", function() {
            menu.classList.toggle("hidden");
        });

        // Close the sidebar when clicking outside of it
        document.addEventListener("click", function(event) {
            var isClickInside = menu.contains(event.target) || close.contains(event.target);
            if (!isClickInside) {
                menu.classList.add("hidden");
            }
        });
    </script>

</body>

</html>
