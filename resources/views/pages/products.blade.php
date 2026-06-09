@extends('layouts.app')

@section('title', 'Produk - ' . config('site.name'))

@section('content')
@include('partials.page-header', [
    'title' => 'Katalog Produk',
    'subtitle' => 'Temukan sensor yang sesuai kebutuhan Anda',
    'image' => 'products',
])

<section class="py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <form method="GET" action="{{ route('products.index') }}" class="flex flex-col gap-4 rounded-2xl bg-white p-6 shadow-lg sm:flex-row sm:items-end">
            <div class="flex-1">
                <label class="block text-base font-medium mb-2">Cari Produk</label>
                <input type="search" name="q" value="{{ $search }}" placeholder="Ketik nama produk..."
                       class="w-full rounded-xl border border-gray-200 px-4 py-3 text-lg focus:border-brand-500 focus:ring-2 focus:ring-brand-200 dark:border-gray-700 dark:bg-gray-800">
            </div>
            <div class="sm:w-64">
                <label class="block text-base font-medium mb-2">Kategori</label>
                <select name="kategori" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-lg focus:border-brand-500 dark:border-gray-700 dark:bg-gray-800">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->slug }}" @selected($activeCategory === $cat->slug)>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="rounded-xl bg-brand-500 px-8 py-3 text-lg font-semibold text-white hover:bg-brand-600">Cari</button>
        </form>

        <div class="mt-6 flex flex-wrap gap-2">
            <a href="{{ route('products.index') }}"
               class="rounded-full px-4 py-2 text-base font-medium {{ !$activeCategory ? 'bg-brand-500 text-white' : 'bg-gray-100 dark:bg-gray-800' }}">
                Semua
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('products.index', ['kategori' => $cat->slug]) }}"
                   class="rounded-full px-4 py-2 text-base font-medium {{ $activeCategory === $cat->slug ? 'bg-brand-500 text-white' : 'bg-gray-100 dark:bg-gray-800' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>

        @if($products->count())
            <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
            <div class="mt-12">{{ $products->links() }}</div>
        @else
            <div class="mt-16 text-center py-16">
                <p class="text-xl text-gray-500">Produk tidak ditemukan. Coba kata kunci lain.</p>
                <a href="{{ route('products.index') }}" class="mt-4 inline-block text-brand-600 font-semibold">Lihat semua produk</a>
            </div>
        @endif
    </div>
</section>

@include('partials.cta')
@endsection
