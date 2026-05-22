@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
<div class="flex items-center justify-between">
    <h1 class="text-2xl font-bold">Kelola Kategori</h1>
    <a href="{{ route('admin.categories.create') }}" class="rounded-xl bg-brand-500 px-5 py-2.5 font-semibold text-white hover:bg-brand-600">+ Tambah Kategori</a>
</div>

<div class="mt-8 overflow-x-auto rounded-2xl bg-white shadow">
    <table class="w-full text-left">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4">Nama</th>
                <th class="px-6 py-4">Slug</th>
                <th class="px-6 py-4">Produk</th>
                <th class="px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr class="border-t">
                    <td class="px-6 py-4">{{ $category->name }}</td>
                    <td class="px-6 py-4">{{ $category->slug }}</td>
                    <td class="px-6 py-4">{{ $category->products_count }}</td>
                    <td class="px-6 py-4 space-x-3">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="text-brand-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kategori?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-6 py-8 text-center text-gray-500">Belum ada kategori.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4">{{ $categories->links() }}</div>
</div>
@endsection
