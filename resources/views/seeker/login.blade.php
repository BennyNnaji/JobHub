<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Seeker Login | {{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="{{ asset('images/front/fav.png') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body class=" bg-gray-200">

    <section
        style="background-image: url('https://cdn.pixabay.com/photo/2017/11/11/21/55/freedom-2940655_960_720.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        <section class="bg-white/50 min-h-screen flex flex-col items-center justify-center">
            <div class="w-11/12 md:w-3/6 mx-auto">
                <a href="{{ route('index') }}"><img src="{{ asset('images/front/logo.png') }}" alt="" class="w-2/6 mx-auto"></a>
            </div>
            <section data-aos="zoom-in"
                class="w-11/12 md:w-3/6 mx-auto border-2 border-blue-600 rounded bg-white px-3 py-5">
                <div class="w-4/6 mx-auto flex justify-between">
                    <h1 class="text-2xl font-semibold text-blue-600 text-left">Job Seeker Login</h1>
                    <a href="{{ route('company_login') }}" class="text-blue-600 ml-3">Recruiter? Login Here</a>
                </div>

                <form action="" method="post" class="mt-3 w-5/6 mx-auto my-10">
                    @csrf
                    <div class="w-4/6 mx-auto">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="w-full"
                            placeholder="Enter your email">
                    </div>
                    <div class="w-4/6 mx-auto">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" class="w-full"
                            placeholder="Enter your password">
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('seeker_login_reset') }}" class="text-blue-600 ml-3">Forgot Password?</a>
                        <a href="{{ route('seeker_register') }}" class="text-blue-600 ml-3">Don't Have Account?
                            Register</a>
                    </div>
                    <button type="submit"
                        class="w-full hover:bg-blue-600 bg-blue-500 text-white p-2 rounded  my-5">Login</button>

                </form>
            </section>
        </section>
    </section>

    <script>
        AOS.init();
    </script>

</body>

</html>
