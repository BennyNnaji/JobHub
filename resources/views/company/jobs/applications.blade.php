@extends('company.layout.app')

@section('content')
    <div class="w-full rounded-t-2xl bg-gray-400 text-gray-200 font-semibold text-3xl px-4 flex justify-between">
        <div>
            Job Applications
        </div>
        <div class="w-2/12 md:w-auto">
            <a href="{{ url()->previous() }}"><img src="{{ asset('images/front/back.png') }}" alt="icon" class="w-full"></a>
        </div>
    </div>
    <section>
        @if (count($applications) > 0)
            <div class="w-11/12 md:w-5/6 mx-auto grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 my-3">
                <!-- Dummy Grid -->
                @foreach ($applications as $application)
                    <div class="w-full bg-white rounded-lg shadow-lg">
                        <a href="{{ route('application_details', $application->id) }}">
                            <div class="p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <h3 class="text-gray-500 text-sm">{{ $application->job->job_title }} <span class="text-xs text-green-500 italic capitalize">{{ str_replace('_', ' ', $application->status) }}</span></h3>
                                            <p class="text-red-600 text-sm">{{ $application->seeker->name }}</p>
                                            <p class="text-gray-300 text-xs italic">{{ $application->created_at->diffForHumans() }}</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <!-- End Dummy Grid -->
            </div>
        @else
            <div class="w-1/4 mx-auto text-center italic text-2xl my-8">No Applications</div>
        @endif
    </section>
@endsection
