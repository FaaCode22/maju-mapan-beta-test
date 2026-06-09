@extends('layouts.admin')

@section('title', 'Edit Data Perusahaan')

@section('content')
<h1 class="text-2xl font-bold">Edit Data Perusahaan</h1>

@if(session('success'))
    <div class="mt-4 rounded-xl bg-green-100 px-4 py-3 text-green-700">{{ session('success') }}</div>
@endif

<form action="{{ route('admin.site.update') }}" method="POST" class="mt-8 max-w-4xl space-y-8">
    @csrf @method('PUT')

    {{-- PROFIL PERUSAHAAN --}}
    <div class="rounded-2xl bg-white p-6 shadow space-y-4">
        <h2 class="text-xl font-bold">Profil Perusahaan</h2>

        <div>
            <label class="block font-medium mb-2">Foto Perusahaan (Link)</label>
            <input type="text" name="company[photo]" value="{{ $company['photo'] ?? '' }}"
                   placeholder="https://... atau images/hero-farming.svg"
                   class="w-full rounded-xl border border-gray-200 px-4 py-3">
            @if(!empty($company['photo']))
                <img src="{{ str_starts_with($company['photo'], 'http') ? $company['photo'] : asset($company['photo']) }}"
                     class="mt-2 h-32 rounded-xl object-cover">
            @endif
        </div>

<div>
    <label class="block font-medium mb-2">Profil Perusahaan</label>
    <textarea name="company[profil]" rows="4"
              class="w-full rounded-xl border border-gray-200 px-4 py-3">{{ $company['profil'] ?? '' }}</textarea>
</div>

<div>
    <label class="block font-medium mb-2">Visi</label>
    <textarea name="company[visi]" rows="3"
              class="w-full rounded-xl border border-gray-200 px-4 py-3">{{ $company['visi'] ?? '' }}</textarea>
</div>

        <div>
            <label class="block font-medium mb-2">Misi</label>
            <textarea name="company[misi]" rows="5"
                      class="w-full rounded-xl border border-gray-200 px-4 py-3">{{ $company['misi'] ?? '' }}</textarea>
            <p class="mt-1 text-sm text-gray-400">Pisahkan tiap poin dengan baris baru (Enter)</p>
        </div>
    </div>

{{-- SMART FARMING --}}
<div class="rounded-2xl bg-white p-6 shadow space-y-4">
    <h2 class="text-xl font-bold">Apa itu Smart Farming?</h2>
    <div>
        <label class="block font-medium mb-2">Judul</label>
        <input type="text" name="smartfarming[title]" value="{{ $smartfarming['title'] ?? '' }}"
               class="w-full rounded-xl border border-gray-200 px-4 py-3">
    </div>
    <div>
        <label class="block font-medium mb-2">Deskripsi</label>
        <textarea name="smartfarming[desc]" rows="4"
                  class="w-full rounded-xl border border-gray-200 px-4 py-3">{{ $smartfarming['desc'] ?? '' }}</textarea>
    </div>
</div>

    {{-- TIM --}}
    <div class="rounded-2xl bg-white p-6 shadow space-y-4">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-bold">Tim Kami</h2>
            <button type="button" onclick="addMember()"
                    class="rounded-xl bg-brand-500 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-600">
                + Tambah Anggota
            </button>
        </div>

        <div id="team-list" class="space-y-4">
            @foreach($team as $i => $member)
            <div class="team-member rounded-xl border border-gray-200 p-4 space-y-3">
                <div class="flex items-center justify-between">
                    <span class="font-semibold text-gray-600">Anggota {{ $i + 1 }}</span>
                    <button type="button" onclick="this.closest('.team-member').remove()"
                            class="text-red-500 text-sm hover:underline">Hapus</button>
                </div>
                <div class="grid gap-3 md:grid-cols-3">
                    <div>
                        <label class="block text-sm font-medium mb-1">Nama</label>
                        <input type="text" name="team[{{ $i }}][name]" value="{{ $member['name'] }}"
                               class="w-full rounded-xl border border-gray-200 px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Role/Jabatan</label>
                        <input type="text" name="team[{{ $i }}][role]" value="{{ $member['role'] }}"
                               class="w-full rounded-xl border border-gray-200 px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Foto (Link)</label>
                        <input type="text" name="team[{{ $i }}][photo]" value="{{ $member['photo'] }}"
                               placeholder="https://..."
                               class="w-full rounded-xl border border-gray-200 px-3 py-2">
                    </div>
                </div>
                @if(!empty($member['photo']))
                    <img src="{{ str_starts_with($member['photo'], 'http') ? $member['photo'] : asset($member['photo']) }}"
                         class="h-16 w-16 rounded-full object-cover">
                @endif
            </div>
            @endforeach
        </div>
    </div>

    {{-- PERJALANAN KAMI --}}
<div class="rounded-2xl bg-white p-6 shadow space-y-4">
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold">Perjalanan Kami</h2>
        <button type="button" onclick="addJourney()"
                class="rounded-xl bg-brand-500 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-600">
            + Tambah
        </button>
    </div>

    <div id="journey-list" class="space-y-4">
        @foreach($journey as $i => $item)
        <div class="journey-item rounded-xl border border-gray-200 p-4 space-y-3">
            <div class="flex items-center justify-between">
                <span class="font-semibold text-gray-600">Perjalanan {{ $i + 1 }}</span>
                <button type="button" onclick="this.closest('.journey-item').remove()"
                        class="text-red-500 text-sm hover:underline">Hapus</button>
            </div>
            <div class="grid gap-3 md:grid-cols-3">
                <div>
                    <label class="block text-sm font-medium mb-1">Tahun</label>
                    <input type="text" name="journey[{{ $i }}][year]" value="{{ $item['year'] }}"
                           class="w-full rounded-xl border border-gray-200 px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Judul</label>
                    <input type="text" name="journey[{{ $i }}][title]" value="{{ $item['title'] }}"
                           class="w-full rounded-xl border border-gray-200 px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Deskripsi</label>
                    <input type="text" name="journey[{{ $i }}][desc]" value="{{ $item['desc'] }}"
                           class="w-full rounded-xl border border-gray-200 px-3 py-2">
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

    <button type="submit" class="rounded-xl bg-brand-500 px-8 py-3 font-semibold text-white hover:bg-brand-600">
        Simpan Perubahan
    </button>
</form>

@push('scripts')
<script>
let memberCount = {{ count($team) }};

function addMember() {
    const i = memberCount++;
    const html = `
    <div class="team-member rounded-xl border border-gray-200 p-4 space-y-3">
        <div class="flex items-center justify-between">
            <span class="font-semibold text-gray-600">Anggota Baru</span>
            <button type="button" onclick="this.closest('.team-member').remove()"
                    class="text-red-500 text-sm hover:underline">Hapus</button>
        </div>
        <div class="grid gap-3 md:grid-cols-3">
            <div>
                <label class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" name="team[${i}][name]"
                       class="w-full rounded-xl border border-gray-200 px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Role/Jabatan</label>
                <input type="text" name="team[${i}][role]"
                       class="w-full rounded-xl border border-gray-200 px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Foto (Link)</label>
                <input type="text" name="team[${i}][photo]" placeholder="https://..."
                       class="w-full rounded-xl border border-gray-200 px-3 py-2">
            </div>
        </div>
    </div>`;
    document.getElementById('team-list').insertAdjacentHTML('beforeend', html);
}

let journeyCount = {{ count($journey) }};

function addJourney() {
    const i = journeyCount++;
    const html = `
    <div class="journey-item rounded-xl border border-gray-200 p-4 space-y-3">
        <div class="flex items-center justify-between">
            <span class="font-semibold text-gray-600">Perjalanan Baru</span>
            <button type="button" onclick="this.closest('.journey-item').remove()"
                    class="text-red-500 text-sm hover:underline">Hapus</button>
        </div>
        <div class="grid gap-3 md:grid-cols-3">
            <div>
                <label class="block text-sm font-medium mb-1">Tahun</label>
                <input type="text" name="journey[${i}][year]"
                       class="w-full rounded-xl border border-gray-200 px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Judul</label>
                <input type="text" name="journey[${i}][title]"
                       class="w-full rounded-xl border border-gray-200 px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Deskripsi</label>
                <input type="text" name="journey[${i}][desc]"
                       class="w-full rounded-xl border border-gray-200 px-3 py-2">
            </div>
        </div>
    </div>`;
    document.getElementById('journey-list').insertAdjacentHTML('beforeend', html);
}
</script>
@endpush
@endsection