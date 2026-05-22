@extends('layouts.admin')

@section('title', 'Produk')

@section('content')
<div class="flex items-center justify-between">
    <h1 class="text-2xl font-bold">Kelola Produk</h1>
    <a href="{{ route('admin.products.create') }}" class="rounded-xl bg-brand-500 px-5 py-2.5 font-semibold text-white hover:bg-brand-600">+ Tambah Produk</a>
</div>

<div class="mt-8 overflow-x-auto rounded-2xl bg-white shadow">
    <table class="w-full text-left">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4">Nama</th>
                <th class="px-6 py-4">Kategori</th>
                <th class="px-6 py-4">Harga</th>
                <th class="px-6 py-4">Unggulan</th>
                <th class="px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr class="border-t">
                    <td class="px-6 py-4">{{ $product->name }}</td>
                    <td class="px-6 py-4">{{ $product->category->name }}</td>
                    <td class="px-6 py-4">{{ $product->formatted_price }}</td>
                    <td class="px-6 py-4">{{ $product->is_featured ? 'Ya' : '-' }}</td>
                    <td class="px-6 py-4 space-x-3">
                        <a href="{{ route('products.show', $product) }}" target="_blank" class="text-gray-600 hover:underline">Lihat</a>
                        <a href="{{ route('admin.products.edit', $product) }}" class="text-brand-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Hapus produk ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada produk.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4">{{ $products->links() }}</div>
</div>
@endsection
