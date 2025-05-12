@extends('layouts/dashboard-layout')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4 bg-white">
        <form class="space-y-6" action="{{route('api.subcat.create')}}" method="POST">
            <div>
                <h1 class="py-4 text-lg font-bold">Create a new sub-category</h1>

                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm">
            </div>
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Class</label>
                <select id="category_id" name="category_id"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm">
                    <option value="">Select the appropriate category id</option>

                    @foreach ($categories as $category)

                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div>

                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>


@endsection
