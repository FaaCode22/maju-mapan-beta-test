@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-2xl font-bold">Dashboard</h1>

<div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
    <div class="rounded-2xl bg-white p-6 shadow">
        <p class="text-gray-500">Total Produk</p>
        <p class="mt-2 text-3xl font-bold text-brand-600">{{ $productCount }}</p>
    </div>
    <div class="rounded-2xl bg-white p-6 shadow">
        <p class="text-gray-500">Kategori</p>
        <p class="mt-2 text-3xl font-bold text-brand-600">{{ $categoryCount }}</p>
    </div>
    <div class="rounded-2xl bg-white p-6 shadow">
        <p class="text-gray-500">Produk Unggulan</p>
        <p class="mt-2 text-3xl font-bold text-accent-500">{{ $featuredCount }}</p>
    </div>
    <div class="rounded-2xl bg-white p-6 shadow">
        <p class="text-gray-500">Pesan Kontak</p>
        <p class="mt-2 text-3xl font-bold text-brand-600">{{ $messageCount }}</p>
    </div>
</div>

<div class="mt-10 rounded-2xl bg-white p-6 shadow">
    <h2 class="text-xl font-bold">Produk Terbaru</h2>
    <div class="mt-4 overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b">
                    <th class="py-3 pr-4">Nama</th>
                    <th class="py-3 pr-4">Kategori</th>
                    <th class="py-3 pr-4">Harga</th>
                    <th class="py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentProducts as $product)
                    <tr class="border-b border-gray-100">
                        <td class="py-3 pr-4">{{ $product->name }}</td>
                        <td class="py-3 pr-4">{{ $product->category->name }}</td>
                        <td class="py-3 pr-4">{{ $product->formatted_price }}</td>
                        <td class="py-3">
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-brand-600 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
