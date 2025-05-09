@extends('admin.layouts.app')

@section('title', 'Edit Role')

@section('page_title')
    Edit Role
@endsection

@section('content')
    <div class="bg-white shadow-md rounded-md p-6">
        <h1 class="text-xl font-semibold text-gray-800 mb-4">Edit Role</h1>

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

        <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name', $role->name) }}" required>
            </div>

            <div>
                <label for="permissions" class="block text-gray-700 text-sm font-bold mb-2">Permissions</label>
                <div class="grid grid-cols-4 gap-2">
                    @foreach ($permissions as $permission)
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" id="permission_{{ Str::slug($permission->name) }}" value="{{ $permission->name }}" class="form-checkbox h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded" {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                            <label for="permission_{{ Str::slug($permission->name) }}" class="ml-2 text-gray-700 text-sm">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    UPDATE
                </button>
                <a href="{{ route('admin.roles.index') }}" class="inline-block ml-3 align-baseline font-bold text-sm text-purple-500 hover:text-purple-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection