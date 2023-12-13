    @extends('company.layout.app')
    @section('content')
        <div class="w-full rounded-t-2xl bg-gray-400 text-gray-200 font-semibold text-3xl px-4 flex justify-between">
            <div>
                Posted Jobs
            </div>
            <div class="w-2/12 md:w-auto">
                <a href="{{ url()->previous() }}"><img src="{{ asset('images/front/back.png') }}" alt="icon"
                        class="w-full"></a>
            </div>
        </div>

                <div class="w-11/12 md:w-5/6 mx-auto grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 my-3">
            <!-- Dummy Grid -->
            <a href="">
                <div class="bg-gray-200 p-4 border-2 border-red-600/50 rounded ">
                    <h2 class="text-lg text-left font-semibold">Senior Frontend Developer</h2>
                    <p class="text-xs italic text-gray-400">
                        <span>
                            <i class="fa-solid fa-location-dot"></i>Abuja, Nigeria
                        </span>
                        <span>
                            <i class="fa-solid fa-clock"></i> 2 days ago
                        </span>
                        <span>
                            <i class="fa-solid fa-money-bill"></i> $9/Hr
                        </span>
                    </p>
                    <p class="px-4 py-2 w-3/6 rounded "> Eric Ltd</p>
                    <div>
                        <ul class="list-disc list-inside text-sm italic ">
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                        </ul>
                        <p class="bg-red-500 text-white p-2 rounded my-2 w-3/6 text-center hover:bg-red-600">Intern</p>
                    </div>
                </div>
            </a>
    
  
        
        </div>
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
    @endsection
