<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Preloader Styles */
        #preloader {
            display: none;
        }

        .loader {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 24px;
            height: 24px;
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader" class="fixed inset-0 bg-white flex items-center justify-center z-50">
        <!-- You can customize the preloader animation or use an animated GIF -->
        <div class="loader border-t-4 border-blue-500 rounded-full animate-spin h-12 w-12">
            <img src="{{ asset('images/front/preloader.gif') }}" alt="">
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Hide the preloader
            document.getElementById("preloader").style.display = "none";
        });
    </script>
</body>

</html>
