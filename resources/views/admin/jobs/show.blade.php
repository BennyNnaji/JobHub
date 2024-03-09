@extends('admin.layouts.side_top_menu')

@section('content')
    <div class="flex justify-between items-center  px-5 py-2 w-full">
        <div>
            <h1 class="text-xl font-bold">Job: {{ $job->job_title }} | Company: {{ $job->company->name }}</h1>
        </div>
        <div>
            <a href="{{ URL::previous() }}"><i class="fa-solid fa-circle-left fa-2x"></i></a>
        </div>
    </div>
    Job Details Here
@endsection
