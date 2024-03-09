@extends('admin.layouts.side_top_menu')

@section('content')
    <div class="flex justify-between items-center  px-5 py-2 w-full">
        <div>
            <h1 class="text-xl font-bold">Verified Companies</h1>
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
                    <th class="py-2 px-4 border-b border-l">Website</th>
                    <th class="py-2 px-4 border-b border-l">Jobs</th>
                    <th class="py-2 px-4 border-b border-l">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr class="{{ $loop->even ? 'bg-gray-300' : 'bg-gray-400' }} px-2 border-l">
                        <td class="border-l px-4">{{ $loop->iteration }}</td>
                        <td class="border-l px-4">{{ $company->name }}</td>
                        <td class="border-l px-4">{{ $company->email }}</td>
                        <td class="border-l px-4">{{ $company->phone }}</td>
                        <td class="border-l px-4"><a href="https://{{ $company->website }}"
                                target="_blank">{{ $company->website }}</a></td>
                        <td class="border-l px-4">{{ $company->jobs->count() }}</td>
                        <td class="border-l px-4">
                            <a href="{{ route('admin_company_show', $company->id) }}" class=""><i
                                    class="fa-solid fa-eye" title="View"></i></a>
                            <a href="{{ route('admin_company_edit', $company->id) }}" class=""><i
                                    class="fa-solid fa-pen-to-square text-green-500" title="Edit"></i></a>
                            <a href="{{ route('admin_company_edit', $company->id) }}" class=""><i
                                    class="fa-solid fa-ban  text-red-500" title="Ban"></i></a>

                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th class="py-2 px-4 border-b border-l">SN</th>
                    <th class="py-2 px-4 border-b border-l">Name</th>
                    <th class="py-2 px-4 border-b border-l">Email</th>
                    <th class="py-2 px-4 border-b border-l">Phone</th>
                    <th class="py-2 px-4 border-b border-l">Website</th>
                    <th class="py-2 px-4 border-b border-l">Jobs</th>
                    <th class="py-2 px-4 border-b border-l">Action</th>
                </tr>

            </tfoot>
        </table>
        {{ $companies->links() }}
    </section>
@endsection
