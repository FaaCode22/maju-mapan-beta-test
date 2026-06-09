@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
<h1 class="text-2xl font-bold">Edit Kategori</h1>

<form action="{{ route('admin.categories.update', $category) }}" method="POST" class="mt-8 max-w-lg rounded-2xl bg-white p-8 shadow space-y-5">
    @csrf @method('PUT')
    <div>
        <label class="block font-medium mb-2">Nama *</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" required class="w-full rounded-xl border border-gray-200 px-4 py-3">
    </div>
    <div>
        <label class="block font-medium mb-2">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" class="w-full rounded-xl border border-gray-200 px-4 py-3">
    </div>
<div>
    <label class="block font-medium mb-2">Icon</label>

    @php $currentIcon = old('icon', $category->icon ?? 'sensor'); @endphp
    @php $isCustom = !in_array($currentIcon, ['temperature','humidity','ph','barn','pond','pump','sensor']); @endphp

    {{-- Pilihan icon tersedia --}}
    <div class="grid grid-cols-4 gap-2 mb-3">
        @foreach(['temperature','humidity','ph','barn','pond','pump','sensor'] as $ic)
        <label class="flex flex-col items-center gap-1 cursor-pointer border rounded-xl p-2 hover:border-brand-500
                      {{ $currentIcon === $ic ? 'border-brand-500 bg-brand-50' : 'border-gray-200' }}">
            <input type="radio" name="icon_type" value="{{ $ic }}" class="hidden" onchange="setIcon('{{ $ic }}')">
            @include('partials.category-icon', ['icon' => $ic])
            <span class="text-xs">{{ $ic }}</span>
        </label>
        @endforeach
        <label class="flex flex-col items-center gap-1 cursor-pointer border rounded-xl p-2 hover:border-brand-500
                      {{ $isCustom ? 'border-brand-500 bg-brand-50' : 'border-gray-200' }}">
            <input type="radio" name="icon_type" value="custom" class="hidden" onchange="document.getElementById('custom_icon_wrap').classList.remove('hidden')">
            <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101"/></svg>
            <span class="text-xs">Link URL</span>
        </label>
    </div>

    {{-- Input link custom --}}
    <div id="custom_icon_wrap" class="{{ $isCustom ? '' : 'hidden' }}">
        <input type="text" id="custom_icon_input"
               value="{{ $isCustom ? $currentIcon : '' }}"
               placeholder="https://cdn.discordapp.com/..."
               class="w-full rounded-xl border border-gray-200 px-4 py-3"
               oninput="document.getElementById('icon_value').value = this.value">
        @if($isCustom)
            <img src="{{ $currentIcon }}" class="mt-2 h-16 w-16 rounded-lg object-cover">
        @endif
        <p class="mt-1 text-sm text-gray-400">Masukkan link gambar icon</p>
    </div>

    <input type="hidden" name="icon" id="icon_value" value="{{ $currentIcon }}">
</div>

<script>
function setIcon(val) {
    document.getElementById('icon_value').value = val;
    document.getElementById('custom_icon_wrap').classList.add('hidden');
}
</script>
    <button type="submit" class="rounded-xl bg-brand-500 px-8 py-3 font-semibold text-white hover:bg-brand-600">Perbarui</button>
</form>
@endsection
