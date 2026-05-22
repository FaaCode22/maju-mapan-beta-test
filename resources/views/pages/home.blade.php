@extends('layouts.app')

@section('title', config('site.name') . ' - Sensor Pertanian & Peternakan')

@section('content')
    @include('partials.hero')

    <section id="kategori" class="py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-center text-3xl font-bold sm:text-4xl">Kategori Produk</h2>
            <p class="mt-4 text-center text-lg text-gray-600 dark:text-gray-400">Pilih kategori sesuai kebutuhan lahan atau kandang Anda</p>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($categories as $category)
                    <x-category-card :category="$category" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-20 dark:bg-gray-900">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">
                <div>
                    <h2 class="text-3xl font-bold sm:text-4xl">Produk Unggulan</h2>
                    <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">Pilihan terbaik untuk memulai smart farming</p>
                </div>
                <a href="{{ route('products.index') }}" class="text-lg font-semibold text-brand-600 hover:underline">Lihat Semua →</a>
            </div>
            <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($featuredProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-center text-3xl font-bold sm:text-4xl">Keunggulan Layanan Kami</h2>
            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['title' => 'Mudah Digunakan', 'desc' => 'Dirancang untuk petani dan peternak tanpa keahlian teknis.', 'icon' => 'M9 12l2 2 4-4'],
                    ['title' => 'Pemantauan Realtime', 'desc' => 'Pantau kondisi dari HP kapan saja, di mana saja.', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['title' => 'Harga Terjangkau', 'desc' => 'Investasi kecil dengan manfaat jangka panjang.', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['title' => 'Dukungan WhatsApp', 'desc' => 'Tim siap bantu instalasi dan troubleshooting.', 'icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z'],
                ] as $item)
                    <div class="rounded-2xl bg-white p-8 shadow-lg dark:bg-gray-900">
                        <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-brand-100 text-brand-600 dark:bg-brand-900">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/></svg>
                        </div>
                        <h3 class="mt-4 text-xl font-bold">{{ $item['title'] }}</h3>
                        <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-brand-50 py-20 dark:bg-gray-900">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-center text-3xl font-bold sm:text-4xl">Cara Kerja Sistem</h2>
            <div class="mt-12 grid gap-8 md:grid-cols-3">
                @foreach([
                    ['step' => '1', 'title' => 'Pasang Sensor', 'desc' => 'Pasang sensor di lokasi yang diinginkan mengikuti panduan sederhana.'],
                    ['step' => '2', 'title' => 'Hubungkan ke Aplikasi', 'desc' => 'Sensor terhubung otomatis ke WiFi dan aplikasi di smartphone.'],
                    ['step' => '3', 'title' => 'Pantau & Bertindak', 'desc' => 'Terima notifikasi dan ambil tindakan sebelum terjadi kerugian.'],
                ] as $step)
                    <div class="text-center">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-brand-500 text-2xl font-bold text-white">{{ $step['step'] }}</div>
                        <h3 class="mt-4 text-xl font-bold">{{ $step['title'] }}</h3>
                        <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-center text-3xl font-bold sm:text-4xl">Testimoni Pelanggan</h2>
            <div class="mt-12 grid gap-8 md:grid-cols-3">
                <x-testimonial-card name="Bapak Sutrisno" role="Petani Sayur, Bogor" initials="BS"
                    quote="Sejak pakai sensor kelembapan, panen saya lebih stabil. Mudah dipakai walau saya tidak paham teknologi." />
                <x-testimonial-card name="Ibu Dewi" role="Peternak Ayam, Bandung" initials="ID"
                    quote="Monitoring kandang lewat HP sangat membantu. Suhu naik langsung dapat notifikasi." />
                <x-testimonial-card name="Pak Ahmad" role="Budidaya Ikan, Sukabumi" initials="PA"
                    quote="Sensor kolam sangat akurat. Pemesanan via WhatsApp juga cepat dan ramah." />
            </div>
        </div>
    </section>

    @include('partials.faq')
    @include('partials.cta')
@endsection
