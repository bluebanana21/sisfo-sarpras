@extends('layouts/dashboard-layout')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <!-- FISRT ROW -->
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="flex flex-col h-36 rounded-md bg-gray-50">
                <p class="p-4">Borrows</p>
                <div class="flex items-center justify-center">
                    <h1 class="text-4xl font-bold">500</h1>

                </div>
            </div>
            <div class="flex items-center justify-center h-24 rounded-md bg-gray-50 ">
                <p>Returns</p>
                <p>500</p>

            </div>
            <div class="flex items-center justify-center h-24 rounded-md bg-gray-50">
                <p>Most Borrowed Item</p>
                <p>500</p>

            </div>
        </div>

        <!-- SECOND ROW -->
        <div class="flex items-center justify-center h-48 mb-4 rounded-md bg-gray-50 ">
            <p>Tambahin chart di sini</p>
        </div>
    </div>
</div>
@endsection
