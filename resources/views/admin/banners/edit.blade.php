@extends('layouts.admin')

@section('title', 'Edit Banner & Header')

@section('content')
<h1 class="text-2xl font-bold">Edit Banner & Header</h1>

@if(session('success'))
    <div class="mt-4 rounded-xl bg-green-100 px-4 py-3 text-green-700">{{ session('success') }}</div>
@endif

<form action="{{ route('admin.banners.update') }}" method="POST" class="mt-8 max-w-4xl space-y-8">
    @csrf @method('PUT')

    {{-- BANNER SLIDER --}}
    <h2 class="text-xl font-bold">Banner Slider</h2>
    @foreach($banners as $i => $banner)
    <div class="rounded-2xl bg-white p-6 shadow space-y-4">
        <h3 class="text-lg font-semibold">Banner {{ $i + 1 }}</h3>
        <div>
            <label class="block font-medium mb-2">Link Foto Banner</label>
            <input type="text" name="banners[{{ $i }}][image]" value="{{ $banner['image'] }}"
                   placeholder="https://... atau images/banners/banner.png"
                   class="w-full rounded-xl border border-gray-200 px-4 py-3">
            @if($banner['image'])
                <img src="{{ str_starts_with($banner['image'], 'http') ? $banner['image'] : asset($banner['image']) }}"
                     class="mt-2 h-32 w-full rounded-xl object-cover">
            @endif
        </div>
        <div>
            <label class="block font-medium mb-2">Judul</label>
            <input type="text" name="banners[{{ $i }}][title]" value="{{ $banner['title'] }}"
                   class="w-full rounded-xl border border-gray-200 px-4 py-3">
        </div>
        <div>
            <label class="block font-medium mb-2">Subjudul</label>
            <textarea name="banners[{{ $i }}][subtitle]" rows="2"
                      class="w-full rounded-xl border border-gray-200 px-4 py-3">{{ $banner['subtitle'] }}</textarea>
        </div>
        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="block font-medium mb-2">Teks Tombol Utama</label>
                <input type="text" name="banners[{{ $i }}][cta_text]" value="{{ $banner['cta_text'] }}"
                       class="w-full rounded-xl border border-gray-200 px-4 py-3">
            </div>
            <div>
                <label class="block font-medium mb-2">URL Tombol Utama</label>
                <input type="text" name="banners[{{ $i }}][cta_url]" value="{{ $banner['cta_url'] }}"
                       class="w-full rounded-xl border border-gray-200 px-4 py-3">
            </div>
            <div>
                <label class="block font-medium mb-2">Teks Tombol WhatsApp</label>
                <input type="text" name="banners[{{ $i }}][cta_secondary_text]" value="{{ $banner['cta_secondary_text'] }}"
                       class="w-full rounded-xl border border-gray-200 px-4 py-3">
            </div>
            <div>
                <label class="block font-medium mb-2">Pesan WhatsApp</label>
                <input type="text" name="banners[{{ $i }}][cta_secondary_whatsapp]" value="{{ $banner['cta_secondary_whatsapp'] }}"
                       class="w-full rounded-xl border border-gray-200 px-4 py-3">
            </div>
        </div>
    </div>
    @endforeach

    {{-- HEADER HALAMAN --}}
    <h2 class="text-xl font-bold mt-8">Header Halaman</h2>
    @foreach(['products' => 'Produk', 'about' => 'Tentang', 'contact' => 'Kontak'] as $key => $label)
    <div class="rounded-2xl bg-white p-6 shadow space-y-4">
        <h3 class="text-lg font-semibold">Header {{ $label }}</h3>
        <div>
            <label class="block font-medium mb-2">Link Foto Header</label>
            <input type="text" name="headers[{{ $key }}]" value="{{ $headers[$key] ?? '' }}"
                   placeholder="https://... atau images/headers/1.png"
                   class="w-full rounded-xl border border-gray-200 px-4 py-3">
            @if(!empty($headers[$key]))
                <img src="{{ str_starts_with($headers[$key], 'http') ? $headers[$key] : asset($headers[$key]) }}"
                     class="mt-2 h-32 w-full rounded-xl object-cover">
            @endif
        </div>
    </div>
    @endforeach

    <button type="submit" class="rounded-xl bg-brand-500 px-8 py-3 font-semibold text-white hover:bg-brand-600">
        Simpan Perubahan
    </button>
</form>
@endsection