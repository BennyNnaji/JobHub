@extends('admin.layouts.side_top_menu')

@section('content')
    <div class="flex justify-between items-center  px-5 py-2 w-full">
        <div>
            <h1 class="text-xl font-bold">Active Seekers</h1>
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
                    <th class="py-2 px-4 border-b border-l">Name</th>
                    <th class="py-2 px-4 border-b border-l">Email</th>
                    <th class="py-2 px-4 border-b border-l">Phone</th>
                    <th class="py-2 px-4 border-b border-l">From</th>
                    <th class="py-2 px-4 border-b border-l">Joined On</th>
                    <th class="py-2 px-4 border-b border-l">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seekers as $seeker)
                    <tr class="{{ $loop->even ? 'bg-gray-300' : 'bg-gray-400' }} px-2 border-l">
                        <td class="border-l px-4">{{ $loop->iteration }}</td>
                        <td class="border-l px-4">{{ $seeker->name }}</td>
                        <td class="border-l px-4">{{ $seeker->email }}</td>
                        <td class="border-l px-4">{{ $seeker->phone }}</td>
                        <td class="border-l px-4">{{ $seeker->state }} - {{ $seeker->country }} </td>
                        <td class="border-l px-4">{{ $seeker->created_at->format('d-M-Y') }}</td>
                        <td class="border-l px-4">
                            <a href="{{ route('admin_seeker_show', $seeker->id) }}" class=""><i class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="bg-black text-white text-left">
                    <th class="py-2 px-4 border-b border-l">SN</th>
                    <th class="py-2 px-4 border-b border-l">Name</th>
                    <th class="py-2 px-4 border-b border-l">Email</th>
                    <th class="py-2 px-4 border-b border-l">Phone</th>
                    <th class="py-2 px-4 border-b border-l">From</th>
                    <th class="py-2 px-4 border-b border-l">Joined On</th>
                    <th class="py-2 px-4 border-b border-l">Action</th>
                </tr>
            </tfoot>

        </table>
        {{ $seekers->links() }}
    </section>
@endsection
