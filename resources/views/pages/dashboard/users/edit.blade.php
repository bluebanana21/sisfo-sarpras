@extends('layouts/dashboard-layout')
@section('content')


<div class="p-4 sm:ml-64">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4 bg-white">
        <form class="space-y-6" action="/api/users/update/{{$user->id}}" method="POST">
            @method('PATCH')
            <div>
                <h1 class="py-4 text-lg font-bold">Create a new user</h1>

                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{$user->name}}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{$user->email}}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" value="{{$user->email}}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm">
            </div>
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select id="role" name="role"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm">
                    <option value="" disabled {{$user->role ? '' : 'selected'}}>Select a role</option>
                    <option value="admin" {{$user->role === 'admin' ? 'selected' : ''}}>Admin</option>
                    <option value="student" {{$user->role === 'student' ? 'selected' : ''}}>Student</option>
                    <option value="teacher" {{$user->role === 'teacher' ? 'selected' : ''}}>Teacher</option>
                </select>
            </div>
            <div>
                <label for="class_code" class="block text-sm font-medium text-gray-700">Class</label>
                <select id="class_code" name="class_code"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm">
                    <option value="" disabled {{$user->class_code ? '' : 'selected'}}>Select the users class code
                    </option>

                    @foreach ($classes as $class)

                    <option value="{{$class->class_code}}" {{$user->class_code === $class->class_code? 'selected' :
                        ''}}>{{$class->class_code}}</option>
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
