<header class="sticky top-0 z-40 shrink-0 glass shadow-sm" x-data="{ mobileOpen: false }">
    <nav class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-xl font-bold text-brand-700 sm:text-2xl">
            <!-- <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-500 text-white">A</span> -->
            <img src="{{ asset('images/logo.png') }}" alt="{{ config('site.name') }}" class="h-14 w-30 rounded-xl object-contain">
            <!-- <span>{{ config('site.name') }}</span> ---buat buat teks navbar-->
        </a>

        <div class="hidden items-center gap-8 md:flex">
            <a href="{{ route('home') }}" class="text-lg font-medium hover:text-brand-600 {{ request()->routeIs('home') ? 'text-brand-600' : '' }}">Home</a>
            <a href="{{ route('products.index') }}" class="text-lg font-medium hover:text-brand-600 {{ request()->routeIs('products.*') ? 'text-brand-600' : '' }}">Produk</a>
            <a href="{{ route('about') }}" class="text-lg font-medium hover:text-brand-600 {{ request()->routeIs('about') ? 'text-brand-600' : '' }}">Tentang</a>
            <a href="{{ route('contact') }}" class="text-lg font-medium hover:text-brand-600 {{ request()->routeIs('contact') ? 'text-brand-600' : '' }}">Contact</a>
            <a href="{{ \App\Support\WhatsappHelper::url() }}" target="_blank" rel="noopener"
               class="rounded-xl bg-brand-500 px-5 py-2.5 text-base font-semibold text-white transition hover:bg-brand-600 hover:scale-105">
                WhatsApp
            </a>
        </div>

        <button @click="mobileOpen = !mobileOpen" class="rounded-xl p-2 md:hidden" aria-label="Menu">
            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
    </nav>

    <div x-show="mobileOpen" x-transition @click.outside="mobileOpen = false" x-cloak
         class="border-t border-gray-100 px-4 py-4 md:hidden">
        <div class="flex flex-col gap-4 text-lg">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('products.index') }}">Produk</a>
            <a href="{{ route('about') }}">Tentang</a>
            <a href="{{ route('contact') }}">Contact</a>
            <a href="{{ \App\Support\WhatsappHelper::url() }}" target="_blank" class="rounded-xl bg-brand-500 py-3 text-center font-semibold text-white">WhatsApp</a>
        </div>
    </div>
</header>
