<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - {{ config('site.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-800">
<div class="flex min-h-screen" x-data="{ sidebarOpen: false }">

    {{-- Overlay mobile --}}
    <div x-show="sidebarOpen"
         x-transition.opacity
         @click="sidebarOpen = false"
         class="fixed inset-0 z-20 bg-black/50 lg:hidden"
         x-cloak></div>

    {{-- Sidebar --}}
    <aside
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 z-30 w-64 bg-brand-800 text-white transition-transform duration-300 lg:relative lg:translate-x-0 lg:block flex flex-col">

        <div class="p-6">
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold">{{ config('site.name') }}</a>
            <p class="text-sm text-brand-200">Admin Panel</p>
        </div>

        <nav class="px-4 space-y-1 flex-1">
            <a href="{{ route('admin.dashboard') }}"
               class="block rounded-lg px-4 py-3 hover:bg-brand-700 {{ request()->routeIs('admin.dashboard') ? 'bg-brand-700' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.products.index') }}"
               class="block rounded-lg px-4 py-3 hover:bg-brand-700 {{ request()->routeIs('admin.products.*') ? 'bg-brand-700' : '' }}">
                Produk
            </a>
            <a href="{{ route('admin.categories.index') }}"
               class="block rounded-lg px-4 py-3 hover:bg-brand-700 {{ request()->routeIs('admin.categories.*') ? 'bg-brand-700' : '' }}">
                Kategori
            </a>
            <a href="{{ route('admin.banners.edit') }}"
               class="block rounded-lg px-4 py-3 hover:bg-brand-700 {{ request()->routeIs('admin.banners.*') ? 'bg-brand-700' : '' }}">
                Banner
            </a>
            <a href="{{ route('admin.site.edit') }}"
               class="block rounded-lg px-4 py-3 hover:bg-brand-700 {{ request()->routeIs('admin.site.*') ? 'bg-brand-700' : '' }}">
                Perusahaan
            </a>
            <a href="{{ route('home') }}" target="_blank"
               class="block rounded-lg px-4 py-3 hover:bg-brand-700">
                Lihat Website
            </a>
        </nav>

        <div class="p-4">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full rounded-lg bg-brand-900 py-3 hover:bg-brand-950">Logout</button>
            </form>
        </div>
    </aside>

    {{-- Konten utama --}}
    <div class="flex-1 flex flex-col min-w-0">

        {{-- Topbar --}}
        <header class="bg-white shadow-sm px-4 py-4 flex items-center justify-between lg:px-6">
            {{-- Tombol hamburger (mobile) --}}
            <button @click="sidebarOpen = !sidebarOpen"
                    class="rounded-lg p-2 text-gray-600 hover:bg-gray-100 lg:hidden">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <span class="font-bold text-lg lg:hidden">{{ config('site.name') }} Admin</span>
            <span class="hidden lg:block font-bold text-lg">@yield('title', 'Admin')</span>
            <div></div>
        </header>

        {{-- Main --}}
        <main class="flex-1 p-4 lg:p-6">
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
@stack('scripts')
</body>
</html>