@extends('layouts/dashboard-layout')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4 bg-white">
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search-items"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search for items">
            </div>

        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500" id="returns-table">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">Borrower Id</th>
                    <th scope="col" class="px-6 py-3">Return Status</th>
                    <th scope="col" class="px-6 py-3">Fine</th>
                    <th scope="col" class="px-6 py-3">Return Date</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($returns as $return)
                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                    <td class="w-4 px-4 py-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <td class="px-6 py-4 align-middle">
                        {{ $return->borrowing_id}}
                    </td>
                    <td class="px-6 py-4 align-middle">

                        @if ($return->return_status == 'returned')
                        <div class="flex items-center font-bold text-green-600">
                            <p>returned</p>
                            @elseif ($return->return_status== 'late' || $return->return_status == 'lost' ||
                            $return->approval_status == 'damaged')
                            <div class="flex items-center font-bold text-red-600">
                                @elseif ($return->return_status == 'unconfirmed')
                                <div class="flex items-center font-bold text-yellow-600">
                                    <p>unconfirmed</p>

                                    @else

                                    {{ $return->return_status ?? 'null' }}
                                    @endif
                                </div>
                    </td>
                    <td class="px-6 py-4 align-middle">
                        <div class="flex items-center">
                            {{ $return->fine ?? 'not applied' }}
                        </div>
                    </td>
                    <td class="px-6 py-4 align-middle">
                        <div class="flex items-center">
                            {{ $return->created_at}}
                        </div>
                    </td>

                    <td class="px-6 py-4 flex flex-col space-y-1">
                        @if ($return->return_status == 'unconfirmed')

                        {{-- Confirm Return Button --}}
                        <form action="/api/returns/confirm/{{$return->id}}/{{$return->borrowing->item_id}}"
                            method="post">
                            <button type="submit"
                                class="font-medium text-white bg-green-600 p-2 rounded-lg">Confirm</button>
                        </form>

                        {{-- Late Return Button --}}
                        <form action="/api/returns/late/{{$return->id}}/{$return->borrowing->item_id}}" method="post">
                            <button type="submit" class="font-medium text-white bg-red-600 p-2 rounded-lg">Late</button>
                        </form>

                        {{-- Lost Return Button --}}
                        <form action="/api/returns/lost/{{$return->id}}/{$return->borrowing->item_id}}" method="post">
                            <button type="submit" class="font-medium text-white bg-red-600 p-2 rounded-lg">Lost</button>
                        </form>

                        {{-- Damaged Return Button --}}
                        <form action="/api/returns/damaged/{{$return->id}}/{$return->borrowing->item_id}}"
                            method="post">
                            <button type="submit"
                                class="font-medium text-white bg-red-600 p-2 rounded-lg">Damaged</button>
                        </form>

                        {{-- End of buttons --}}
                        @else
                        <p>idk man</p>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById("table-search-items").addEventListener("keyup", function () {
        const query = this.value.toLowerCase();
        const rows = document.querySelectorAll("#item-table tbody tr");

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(query) ? "" : "none";
        });
    });
</script>


@endsection
