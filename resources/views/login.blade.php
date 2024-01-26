@extends('layouts.app')
@section('content')
    <section class="w-11/12 md:w-5/6 mx-auto"
    style="background-image: url('https://cdn.pixabay.com/photo/2015/10/22/00/16/work-1000618_1280.jpg');">

        <div class="bg-white/30 min-h-screen flex flex-col md:flex-row  items-center gap-6">
            <div class="relative my-32 md:my-0">
                <!-- Div with an image -->
                <div class="w-full h-full relative">
                    <img src="https://picsum.photos/601/601"
                    role="img" alt="Sample Image" class="w-full h-full object-cover" />
                    <!-- Overlay div with text -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white/70 p-4 rounded border-dotted boder-2 border-blue-500">
                      <a href="{{ route('company_login') }}">
                        <h2 class="text-2xl font-bold mb-2">Company</h2>
                        <p class="text-gray-700">login as a company to manage your jobs and applications </p>
                      </a>
                    </div>
                </div>
            </div>
            <div class="relative my-32 md:my-0">
                <!-- Div with an image -->
                <div class="w-full h-full relative">
                    <img src="https://picsum.photos/600/600"
                    role="img" alt="Sample Image" class="w-full h-full object-cover" />
                    <!-- Overlay div with text -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white/70 p-4 rounded shadow-md">
                       <a href="{{ route('seeker_login') }}">
                        <h2 class="text-2xl font-bold mb-2">Job Seeker</h2>
                        <p class="text-gray-700">Login as a seeker to apply for jobs</p>
                    </a>
                    </div>
                </div>
            </div>

                  
            
            </div>

      
      

            
 
   
  
          
    </section>
@endsection