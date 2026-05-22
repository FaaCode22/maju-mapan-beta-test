@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<h1 class="text-2xl font-bold">Edit Produk</h1>

<form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="mt-8 max-w-4xl rounded-2xl bg-white p-8 shadow space-y-6">
    @csrf @method('PUT')
    @include('admin.products._form')
    <button type="submit" class="rounded-xl bg-brand-500 px-8 py-3 font-semibold text-white hover:bg-brand-600">Perbarui</button>
</form>
@endsection

@push('scripts')
<script>
function deleteImage(url, btn) {
    if (!confirm('Hapus gambar?')) return;

    const form = document.createElement('form');
    form.method = 'POST';
    form.action = url;

    const csrf = document.createElement('input');
    csrf.type = 'hidden';
    csrf.name = '_token';
    csrf.value = '{{ csrf_token() }}';

    const method = document.createElement('input');
    method.type = 'hidden';
    method.name = '_method';
    method.value = 'DELETE';

    form.appendChild(csrf);
    form.appendChild(method);
    document.body.appendChild(form);
    form.submit();
}
</script>
@endpush