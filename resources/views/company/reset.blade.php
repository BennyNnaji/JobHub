<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company Password Reset | {{ env('APP_NAME') }}</title>
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
        style="background-image: url('https://cdn.pixabay.com/photo/2015/01/09/11/08/startup-594090_1280.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        <section class="bg-white/50 min-h-screen flex flex-col items-center justify-center">
            <div class="w-11/12 md:w-3/6 mx-auto">
                <a href="{{ route('index') }}"><img src="{{ asset('images/front/logo.png') }}" alt="" class="w-2/6 mx-auto"></a>
            </div>
            <section data-aos="zoom-in"
                class="w-11/12 md:w-3/6 mx-auto border-2 border-blue-600 rounded bg-white px-3 py-5">
                <div class="w-4/6 mx-auto flex flex-col justify-between">
                    <h1 class="text-2xl font-semibold text-blue-600 text-left">Company Password Reset</h1>
                    <p class="text-xs italic capitalize text-center"> Please enter your email address below to receive password reset link</p>
                </div>

                <form action="" method="post" class="mt-3 w-5/6 mx-auto my-10">
                    @csrf
                    <div class="w-4/6 mx-auto">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="w-full"
                            placeholder="Enter your email" value="{{ old('email') }}">
                            @error('email')
                            <div class="text-red-700">{{ $message }}</div>
                            @enderror
                    </div>
                    <button type="submit"
                        class="w-full hover:bg-blue-600 bg-blue-500 text-white p-2 rounded  my-5">Send Code</button>

                </form>
            </section>
        </section>
    </section>

    <script>
        AOS.init();
    </script>

</body>

</html>
