<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - {{ config('site.name') }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="flex min-h-screen items-center justify-center bg-hero-gradient font-sans">
    <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-xl">
        <h1 class="text-2xl font-bold text-center text-brand-700">Admin Login</h1>
        <p class="mt-2 text-center text-gray-500">{{ config('site.name') }}</p>

        <form method="POST" action="{{ route('admin.login') }}" class="mt-8 space-y-5">
            @csrf
            <div>
                <label class="block font-medium mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full rounded-xl border border-gray-200 px-4 py-3 @error('email') border-red-500 @enderror">
                @error('email')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block font-medium mb-2">Password</label>
                <input type="password" name="password" required
                       class="w-full rounded-xl border border-gray-200 px-4 py-3">
            </div>
            <label class="flex items-center gap-2">
                <input type="checkbox" name="remember" class="rounded">
                <span>Ingat saya</span>
            </label>
            <button type="submit" class="w-full rounded-xl bg-brand-500 py-3 font-semibold text-white hover:bg-brand-600">Masuk</button>
        </form>
        <a href="{{ route('home') }}" class="mt-6 block text-center text-brand-600 hover:underline">← Kembali ke Website</a>
    </div>
</body>
</html>
