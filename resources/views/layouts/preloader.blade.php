    <style>
        .loader {
            border-radius: 50%;
            width: 80px;
            height: 80px;
        }
    </style>

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
