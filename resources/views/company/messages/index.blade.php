@extends('company.layout.app')
@section('content')
    <div class="w-full rounded-t-2xl bg-gray-400 text-gray-200 font-semibold text-3xl px-4 flex justify-between mb-2">
        <div>
            Messages
        </div>
        <div class="w-2/12 md:w-auto">
            <a href="{{ url()->previous() }}"><img src="{{ asset('images/front/back.png') }}" alt="icon" class="w-full"></a>
        </div>
    </div>
    <section class="w-4/4 elevation-10 rounded-b-lg mx-auto ">
        <table class="w-full">
            <tr class="bg-black text-white rounded-b-lg  text-left">
                <th class="p-3">Date</th>
                <th class="p-3">Sender</th>
                <th class="p-3">Subject</th>
                <th class="p-3">Action</th>
            </tr>
            <tr>
                <td>
                    <div class="text-5xl">26</div>
                    <div class="text-2xl text-gray-500">May</div>
                    <div class="text-md text-gray-400">2024</div>
                </td>
                <td>
                    Benny Nnaji
                </td>
                <td>How many Hours does your interview last?</td>
                <td>
                    <a href=""> <i class="fa-solid fa-eye text-gray-500  mx-2" title="View Message"></i></a>
                    <a href=""> <i class="text-gray-500  mx-2 fa-solid fa-reply" title="Reply Message"></i></a>
                </td>
            </tr>
        </table>

    </section>
@endsection
