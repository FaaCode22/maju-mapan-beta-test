<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - {{ config('site.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-800">
    <div class="flex min-h-screen">
        <aside class="relative hidden min-h-screen w-64 shrink-0 bg-brand-800 text-white lg:block">
            <div class="p-6">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold">{{ config('site.name') }}</a>
                <p class="text-sm text-brand-200">Admin Panel</p>
            </div>
            <nav class="px-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="block rounded-lg px-4 py-3 hover:bg-brand-700 {{ request()->routeIs('admin.dashboard') ? 'bg-brand-700' : '' }}">Dashboard</a>
                <a href="{{ route('admin.products.index') }}" class="block rounded-lg px-4 py-3 hover:bg-brand-700 {{ request()->routeIs('admin.products.*') ? 'bg-brand-700' : '' }}">Produk</a>
                <a href="{{ route('admin.categories.index') }}" class="block rounded-lg px-4 py-3 hover:bg-brand-700 {{ request()->routeIs('admin.categories.*') ? 'bg-brand-700' : '' }}">Kategori</a>
                <a href="{{ route('home') }}" target="_blank" class="block rounded-lg px-4 py-3 hover:bg-brand-700">Lihat Website</a>
            </nav>
            <form action="{{ route('admin.logout') }}" method="POST" class="absolute bottom-6 left-4 right-4">
                @csrf
                <button type="submit" class="w-full rounded-lg bg-brand-900 py-3 hover:bg-brand-950">Logout</button>
            </form>
        </aside>

        <div class="flex-1">
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between lg:hidden">
                <span class="font-bold">{{ config('site.name') }} Admin</span>
                <nav class="flex gap-4 text-sm">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <a href="{{ route('admin.products.index') }}">Produk</a>
                    <a href="{{ route('admin.categories.index') }}">Kategori</a>
                </nav>
            </header>

            <main class="p-6">
                @if(session('success'))
                    <div class="mb-6 rounded-xl bg-green-100 px-4 py-3 text-green-800">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="mb-6 rounded-xl bg-red-100 px-4 py-3 text-red-800">{{ session('error') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
