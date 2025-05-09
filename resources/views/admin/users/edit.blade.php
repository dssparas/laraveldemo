@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('page_title')
    Edit User
@endsection

@section('content')
    <div class="bg-white shadow-md rounded-md p-6">
        <h1 class="text-xl font-semibold text-gray-800 mb-4">Edit User</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li><span class="block sm:inline">{{ $error }}</span></li>
                    @endforeach
                </ul>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path fill-rule="evenodd" d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.546 6.351 14.849a1.2 1.2 0 0 1-1.697-1.697L8.303 10 4.651 6.351a1.2 1.2 0 0 1 1.697-1.697L10 8.303l3.649-3.65a1.2 1.2 0 0 1 1.697 1.697L11.697 10l3.651 3.651a1.2 1.2 0 0 1 0 1.697z"/></svg>
                </span>
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name', $user->name) }}" required>
            </div>

            <div>
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('email', $user->email) }}" required>
            </div>

            <div>
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Leave blank to keep current password">
                <p class="text-gray-500 text-xs italic">Leave blank to keep the current password.</p>
            </div>

            <div>
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Leave blank to keep current password">
                <p class="text-gray-500 text-xs italic">Leave blank to keep the current password.</p>
            </div>

            <div>
                <label for="roles" class="block text-gray-700 text-sm font-bold mb-2">Roles:</label>
                <div class="flex items-center space-x-4">
                    @foreach ($roles as $role)
                        <div class="flex items-center">
                            <input type="checkbox" name="roles[]" id="role_{{ $role->name }}" value="{{ $role->name }}" class="form-checkbox h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded" {{ in_array($role->name, $userRoles) ? 'checked' : '' }}>
                            <label for="role_{{ $role->name }}" class="ml-2 text-gray-700 text-sm">{{ ucfirst($role->name) }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update User
                </button>
                <a href="{{ route('admin.users.index') }}" class="inline-block ml-3 align-baseline font-bold text-sm text-purple-500 hover:text-purple-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection