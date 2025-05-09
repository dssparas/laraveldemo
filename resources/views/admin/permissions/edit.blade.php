@extends('admin.layouts.app')

@section('title', 'Edit Permission')

@section('page_title')
    Edit Permission: {{ $permission->name }}
@endsection

@section('content')
    <div class="bg-white shadow-md rounded-md p-6">
        <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Permission Name:</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $permission->name }}" required>
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Roles:</label>
                <div class="grid grid-cols-3 gap-2">
                    @foreach ($roles as $role)
                        <div class="flex items-center">
                            <input type="checkbox" name="roles[]" value="{{ $role->name }}" class="form-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                @if(in_array($role->name, $permissionRoles)) checked @endif>
                            <label for="{{ $role->name }}" class="ml-2 text-gray-700 text-sm">{{ $role->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('roles')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Permission
                </button>
                <a href="{{ route('admin.permissions.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection