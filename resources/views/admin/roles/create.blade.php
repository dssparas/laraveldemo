@extends('admin.layouts.app')

@section('title', 'Create Role')

@section('page_title')
    Create New Role
@endsection

@section('content')
    <div class="bg-white shadow-md rounded-md p-6">
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Role Name:</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Permissions:</label>
                <div class="grid grid-cols-3 gap-2">
                    @foreach ($permissions as $permission)
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="form-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="{{ $permission->name }}" class="ml-2 text-gray-700 text-sm">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('permissions')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Create Role
                </button>
                <a href="{{ route('admin.roles.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection