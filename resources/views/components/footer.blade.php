<footer class="border-t border-gray-100 bg-gray-50 dark:border-gray-800 dark:bg-gray-900">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">
            <div>
                <h3 class="text-xl font-bold text-brand-700 dark:text-brand-400">{{ config('site.name') }}</h3>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">{{ config('site.tagline') }}</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold">Menu</h4>
                <ul class="mt-4 space-y-2 text-lg">
                    <li><a href="{{ route('home') }}" class="hover:text-brand-600">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:text-brand-600">Produk</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-brand-600">Tentang</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-brand-600">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold">Kontak</h4>
                <ul class="mt-4 space-y-2 text-lg text-gray-600 dark:text-gray-400">
                    <li>{{ config('site.phone') }}</li>
                    <li>{{ config('site.email') }}</li>
                    <li>{{ config('site.hours') }}</li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold">Alamat</h4>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">{{ config('site.address') }}</p>
            </div>
        </div>
        <div class="mt-12 border-t border-gray-200 pt-8 text-center text-base text-gray-500 dark:border-gray-700">
            &copy; {{ date('Y') }} {{ config('site.name') }}. Semua hak dilindungi.
        </div>
    </div>
</footer>
