<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company Registration | {{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="{{ asset('images/front/fav.png') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body class=" bg-gray-200">
    {{-- Preloader --}}
    @include('layouts.preloader')

    <section style="background-image: url('https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849825_1280.jpg')">
        <section class="bg-white/50 min-h-screen flex flex-col items-center justify-center">
            <div class="w-11/12 md:w-3/6 mx-auto">
                <a href="{{ route('index') }}"><img src="{{ asset('images/front/logo.png') }}" alt=""
                        class="w-2/6 mx-auto"></a>
            </div>
            <section data-aos="zoom-in"
                class="w-11/12 md:w-3/6 mx-auto border-2 border-blue-600 rounded bg-white px-3 py-5">
                <div class="w-4/6 mx-auto flex justify-between">
                    <h1 class="text-2xl font-semibold text-blue-600 text-left">Company Registration</h1>
                    <a href="{{ route('seeker_register') }}" class="text-blue-600 ml-3">Seeker? Register Here</a>
                </div>

                <form action="{{ route('company_store') }}" method="post" class="mt-3 w-5/6 mx-auto my-10">
                    @csrf
                    <div class="w-4/6 mx-auto">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company Name</label>
                        <input type="text" name="name" id="name" class="w-full"
                            placeholder="Enter name of your company" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-4/6 mx-auto">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                            address</label>
                        <input type="email" name="email" id="email" class="w-full"
                            placeholder="Enter email of your company" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-4/6 mx-auto">
                        <label for="website"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
                        <input type="url" name="website" id="website" class="w-full"
                            placeholder="Enter your website" value="{{ old('website') }}">
                        @error('website')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-4/6 mx-auto">
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                        <input type="tel" name="phone" id="phone" class="w-full"
                            placeholder="Enter your phone" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-4/6 mx-auto">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" class="w-full"
                            placeholder="Enter your password">
                        @error('password')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-4/6 mx-auto">
                        <label for="password_confirmation"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                            Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full"
                            placeholder="Enter your password again">
                        @error('password_confirmation')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <a href="{{ route('company_login') }}" class="text-blue-600 ml-3">Already have an Account?
                        Login</a>
                    <button type="submit"
                        class="w-full hover:bg-blue-600 bg-blue-500 text-white p-2 rounded  my-5">Register</button>

                </form>

            </section>
        </section>
    </section>

    <script>
        AOS.init();
    </script>
</body>

</html>
