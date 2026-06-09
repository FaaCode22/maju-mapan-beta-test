@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<h1 class="text-2xl font-bold">Tambah Kategori</h1>

<form action="{{ route('admin.categories.store') }}" method="POST" class="mt-8 max-w-lg rounded-2xl bg-white p-8 shadow space-y-5">
    @csrf
    <div>
        <label class="block font-medium mb-2">Nama *</label>
        <input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded-xl border border-gray-200 px-4 py-3">
    </div>
    <div>
        <label class="block font-medium mb-2">Slug</label>
        <input type="text" name="slug" value="{{ old('slug') }}" class="w-full rounded-xl border border-gray-200 px-4 py-3">
    </div>
<div>
    <label class="block font-medium mb-2">Icon</label>

    {{-- Pilihan icon tersedia --}}
    <div class="grid grid-cols-4 gap-2 mb-3">
        @foreach(['temperature','humidity','ph','barn','pond','pump','sensor'] as $ic)
        <label class="flex flex-col items-center gap-1 cursor-pointer border rounded-xl p-2 hover:border-brand-500
                      {{ old('icon') === $ic ? 'border-brand-500 bg-brand-50' : 'border-gray-200' }}">
            <input type="radio" name="icon_type" value="{{ $ic }}" class="hidden" onchange="setIcon('{{ $ic }}')">
            @include('partials.category-icon', ['icon' => $ic])
            <span class="text-xs">{{ $ic }}</span>
        </label>
        @endforeach
        <label class="flex flex-col items-center gap-1 cursor-pointer border rounded-xl p-2 hover:border-brand-500 border-gray-200">
            <input type="radio" name="icon_type" value="custom" class="hidden" onchange="document.getElementById('custom_icon_wrap').classList.remove('hidden')">
            <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101"/></svg>
            <span class="text-xs">Link URL</span>
        </label>
    </div>

    {{-- Input link custom --}}
    <div id="custom_icon_wrap" class="hidden">
        <input type="text" id="custom_icon_input" placeholder="https://cdn.discordapp.com/..."
               class="w-full rounded-xl border border-gray-200 px-4 py-3"
               oninput="document.getElementById('icon_value').value = this.value">
        <p class="mt-1 text-sm text-gray-400">Masukkan link gambar icon</p>
    </div>

    <input type="hidden" name="icon" id="icon_value" value="{{ old('icon', 'sensor') }}">
</div>

<script>
function setIcon(val) {
    document.getElementById('icon_value').value = val;
    document.getElementById('custom_icon_wrap').classList.add('hidden');
}
</script>
    <button type="submit" class="rounded-xl bg-brand-500 px-8 py-3 font-semibold text-white hover:bg-brand-600">Simpan</button>
</form>
@endsection
