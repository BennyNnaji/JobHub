@extends('admin.layouts.side_top_menu')
@section('content')
    <div class="flex justify-between items-center  px-5 py-2 w-full">
        <div>
            <h1 class="text-xl font-bold">All Jobs</h1>
        </div>
        <div>
            <a href="{{ URL::previous() }}"><i class="fa-solid fa-circle-left fa-2x"></i></a>
        </div>
    </div>
    <section class="w-full overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-black text-white text-left">
                    <th class="py-2 px-4 border-b border-l">SN</th>
                    <th class="py-2 px-4 border-b border-l">Title</th>
                    <th class="py-2 px-4 border-b border-l">Company</th>
                    <th class="py-2 px-4 border-b border-l">Status</th>
                    <th class="py-2 px-4 border-b border-l">Date</th>
                    <th class="py-2 px-4 border-b border-l">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr class="{{ $loop->even ? 'bg-gray-300' : 'bg-gray-400' }} px-2 border-l">
                        <td class="border-l px-4">{{ $loop->iteration }}</td>
                        <td class="border-l px-4">{{ $job->job_title }}</td>
                        <td class="border-l px-4">{{ $job->company->name }}</td>
                        <td class="border-l px-4">{{ $job->job_status }}</td>
                        <td class="border-l px-4">{{ $job->created_at->format('d-M-y') }}</td>
                        <td class="border-l px-4">
                            <a href="{{ route('admin_job_show', $job->id) }}" class=""><i
                                    class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="bg-black text-white text-left">
                    <th class="py-2 px-4 border-b border-l">SN</th>
                    <th class="py-2 px-4 border-b border-l">Title</th>
                    <th class="py-2 px-4 border-b border-l">Company</th>
                    <th class="py-2 px-4 border-b border-l">Status</th>
                    <th class="py-2 px-4 border-b border-l">Date</th>
                    <th class="py-2 px-4 border-b border-l">Action</th>
                </tr>
            </tfoot>
        </table>
        {{ $jobs->links() }}
    </section>
@endsection
