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
                <input type="text" id="table-search-users"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search for users">
            </div>
            <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a
                    href="{{route('createUser')}}">+
                    Add New User</a></button>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Class Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                    <td class="w-4 px-4 py-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                        <img class="w-10 h-10 rounded-full" src="{{ asset('assets/user.png') }}" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{$user->name}}</div>
                            <div class="font-normal text-gray-500">{{$user->email}}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4 align-middle">
                        {{$user->role}}
                    </td>
                    <td class="px-6 py-4 align-middle">
                        <div class="flex items-center">
                            @if ($user->class_code == null)
                            null
                            @else
                            {{$user->class_code}}
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 flex flex-col space-y-1">

                        <a href="/dashboard/users/edit/{{$user->id}}" class="font-medium text-white hover:underline">
                            <button class="bg-yellow-400 p-2 rounded-lg">
                                Edit user
                            </button>
                        </a>

                        <form action="/api/users/delete/{{$user->id}}" method="post"
                            onsubmit="return confirm('Are you sure you want to delete {{$user->name}}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="font-medium text-white bg-red-700 p-2 rounded-lg">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
