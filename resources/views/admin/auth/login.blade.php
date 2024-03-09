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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    {{-- Preloader --}}
    @include('layouts.preloader')
    <section class="" style="background-image: url('{{ asset('images/front/admin-bg.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div  class="flex  items-center justify-center h-screen bg-gray-600/70">
            <div class="md:w-2/4 w-4/5 elevation-10 border-2 border-gray-300 bg-white p-5 rounded">
                <a href="{{ route('index') }}"><img src="{{ asset('images/front/logo.png') }}" alt="logo" class="w-2/6 mx-auto"></a>
                <h2 class="text-xl font-bold text-center">Admin Login</h2>
                <p class="w-3/4 mx-auto "><img  class="w-1/1 mx-auto" src="https://img.icons8.com/3d-fluency/94/administrator-male--v4.png" alt="administrator"/> </p>
                <form action="{{ route('admin_login_post') }}" method="post">
                    @csrf
                    <div class="my-3">
                        <label for="username" class="block text-lg font-semibold">Username</label>
                        <input type="username" name="username" id="username" placeholder="Username" class="w-full border-2 border-gray-300 rounded p-1">
                        @error('username')
                            <div class="text-red-700"> <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <label for="password" class="block text-lg font-semibold">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="w-full border-2 border-gray-300 rounded p-1">
                        @error('password')
                            <div class="text-red-700"> <i class="fa-solid fa-circle-exclamation"></i>  {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="my-3 w-1/3">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded"> Login</button>
                    </div>
                    <p><a href="{{ route('admin_forgot_password') }}" class="text-blue-600"> Forgot Password? </a></p>
                </form>
            </div>
        </div>

    </section>
</body>
</html>