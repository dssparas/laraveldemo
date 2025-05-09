@extends('admin.layouts.app')

@section('title', 'Permissions')

@section('page_title')
    Permissions
@endsection

@section('content')
    <a href="{{ route('admin.permissions.create') }}"
       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add Permission</a>

    <table class="min-w-full bg-white shadow rounded overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-left text-sm uppercase tracking-wide text-gray-700">
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($permissions as $permission)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $permission->name }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                       class="bg-yellow-400 text-white px-3 py-1 rounded">Edit</a>
                    <form action="{{ route('admin.permissions.destroy', $permission->id) }}"
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="px-4 py-2 text-center text-gray-500">No permissions found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
