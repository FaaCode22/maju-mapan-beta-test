@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
<h1 class="text-2xl font-bold">Tambah Produk</h1>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="mt-8 max-w-4xl rounded-2xl bg-white p-8 shadow space-y-6">
    @csrf
    @include('admin.products._form', ['product' => new \App\Models\Product()])
    <button type="submit" class="rounded-xl bg-brand-500 px-8 py-3 font-semibold text-white hover:bg-brand-600">Simpan</button>
</form>
@endsection
