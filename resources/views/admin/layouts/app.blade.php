<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

<div class="flex min-h-screen">
    <aside class="w-64 bg-white shadow-md">
        <div class="p-6 text-lg font-bold border-b">Admin Panel</div>
        <nav class="p-4 space-y-2 text-sm">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-gray-200' : 'hover:bg-gray-100' }}">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6"/>
                </svg>
                Dashboard
            </a>
            <a href="{{ route('admin.permissions.index') }}" class="flex items-center px-4 py-2 rounded {{ request()->routeIs('admin.permissions.*') ? 'bg-gray-200' : 'hover:bg-gray-100' }}">
                <span class="mr-2">🔐</span> Permissions
            </a>
            <a href="{{ route('admin.roles.index') }}" class="flex items-center px-4 py-2 rounded {{ request()->routeIs('admin.roles.*') ? 'bg-gray-200' : 'hover:bg-gray-100' }}">
                <span class="mr-2">👥</span> Roles
            </a>
            <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-2 rounded {{ request()->routeIs('admin.users.*') ? 'bg-gray-200' : 'hover:bg-gray-100' }}">
                <span class="mr-2">🙍</span> Users
            </a>
            <a href="#" class="flex items-center px-4 py-2 rounded {{ request()->routeIs('admin.menus.*') ? 'bg-gray-200' : 'hover:bg-gray-100' }}">
                <span class="mr-2">📋</span> Menus
            </a>
            <a href="#" class="flex items-center px-4 py-2 rounded {{ request()->routeIs('admin.categories.*') ? 'bg-gray-200' : 'hover:bg-gray-100' }}">
                <span class="mr-2">📁</span> Categories
            </a>
            <a href="#" class="flex items-center px-4 py-2 rounded {{ request()->routeIs('admin.media.*') ? 'bg-gray-200' : 'hover:bg-gray-100' }}">
                <span class="mr-2">🖼️</span> Media
            </a>
        </nav>
        <div class="absolute bottom-4 left-4 text-red-500">🧱</div>
    </aside>

    <main class="flex-1">
        <header class="flex items-center justify-between p-4 bg-white shadow-md">
            <h1 class="text-xl font-semibold">@yield('page_title')</h1>
            <div class="relative inline-block text-left">
                <button onclick="toggleDropdown()" class="flex items-center text-sm font-medium">
                    SUPER ADMIN
                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="dropdown" class="hidden absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-md z-10">
                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Profile</a>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100">Log Out</button>
                    </form>
                </div>
            </div>
        </header>

        <div class="p-6">
            @yield('content')
        </div>
    </main>
</div>

<script>
    function toggleDropdown() {
        const menu = document.getElementById('dropdown');
        menu.classList.toggle('hidden');
    }
</script>

</body>
</html>