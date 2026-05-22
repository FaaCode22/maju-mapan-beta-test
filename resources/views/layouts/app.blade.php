<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', config('site.tagline'))">
    <title>@yield('title', config('site.name'))</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-gray-800">
    @hasSection('above_fold')
        @yield('above_fold')
    @else
        @include('components.navbar')
    @endif

    <main>
        @yield('content')
    </main>

    @include('components.footer')
    @include('components.whatsapp-button')

    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
             x-transition
             class="fixed bottom-24 right-6 z-50 max-w-sm rounded-2xl bg-brand-600 px-6 py-4 text-lg font-medium text-white shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    @stack('scripts')
</body>
</html>
