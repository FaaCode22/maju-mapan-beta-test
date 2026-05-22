@props(['category'])

<a href="{{ route('products.index', ['kategori' => $category->slug]) }}"
   class="group flex flex-col items-center rounded-2xl bg-white p-8 shadow-lg transition duration-300 hover:scale-105 hover:shadow-xl dark:bg-gray-900">
    <div class="flex h-20 w-20 items-center justify-center rounded-2xl bg-brand-100 text-brand-600 transition group-hover:bg-brand-500 group-hover:text-white dark:bg-brand-900">
        @include('partials.category-icon', ['icon' => $category->icon])
    </div>
    <h3 class="mt-4 text-xl font-bold text-center">{{ $category->name }}</h3>
    <p class="mt-1 text-base text-gray-500">{{ $category->products_count ?? $category->products()->count() }} produk</p>
</a>
