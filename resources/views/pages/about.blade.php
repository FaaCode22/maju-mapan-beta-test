@extends('layouts.app')

@section('title', 'Tentang Kami - ' . config('site.name'))

@section('content')
@include('partials.page-header', [
    'title' => 'Tentang ' . config('site.name'),
    'subtitle' => 'Mitra terpercaya smart farming Indonesia',
    'image' => config('site.headers.about'),
])

<section class="py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Profil Perusahaan --}}
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
            <div>
                <h2 class="text-3xl font-bold">Profil Perusahaan</h2>
                <p class="mt-6 text-lg leading-relaxed text-gray-600">
                    {{ config('site.name') }} didirikan dengan misi membantu petani dan peternak Indonesia memanfaatkan teknologi sensor IoT secara praktis dan terjangkau. Kami memahami bahwa tidak semua pengguna familiar dengan teknologi, oleh karena itu setiap produk dirancang mudah dipasang dan didukung layanan WhatsApp yang responsif.
                </p>
            </div>
            <img src="{{ asset('images/hero-farming.svg') }}" alt="Smart Farming" class="rounded-2xl shadow-xl">
        </div>

        {{-- Visi & Misi --}}
        <div class="mt-20 grid gap-8 md:grid-cols-2">
            <div class="rounded-2xl bg-brand-50 p-8">
                <h3 class="text-2xl font-bold text-brand-700">Visi</h3>
                <p class="mt-4 text-lg text-gray-600">Menjadi penyedia solusi sensor pertanian dan peternakan terdepan yang mudah diakses seluruh lapisan masyarakat Indonesia.</p>
            </div>
            <div class="rounded-2xl bg-accent-400/10 p-8">
                <h3 class="text-2xl font-bold text-accent-600">Misi</h3>
                <ul class="mt-4 space-y-2 text-lg text-gray-600">
                    <li>• Menyediakan produk berkualitas dengan harga terjangkau</li>
                    <li>• Memberikan edukasi dan dukungan berkelanjutan</li>
                    <li>• Meningkatkan produktivitas petani melalui teknologi</li>
                </ul>
            </div>
        </div>

        {{-- Apa itu Smart Farming --}}
        <div class="mt-20">
            <h2 class="text-3xl font-bold text-center">Apa itu Smart Farming?</h2>
            <p class="mx-auto mt-6 max-w-3xl text-center text-lg text-gray-600">
                Smart farming adalah pendekatan pertanian modern yang memanfaatkan sensor IoT untuk memantau kondisi lingkungan secara realtime. Dengan data suhu, kelembapan, dan pH, petani dapat mengambil keputusan lebih cepat dan mengurangi risiko gagal panen.
            </p>
        </div>

        {{-- Tim Kami (Carousel) --}}
        <div class="mt-20">
            <h2 class="text-3xl font-bold text-center">Tim Kami</h2>
            <p class="mt-4 text-center text-lg text-gray-600">Orang-orang di balik solusi sensor AgroSense</p>

            {{-- Wrapper luar sebagai acuan lebar --}}
            <div class="mt-12" id="team-outer">
                {{-- Viewport: clip kartu yang keluar --}}
                <div class="overflow-hidden" id="team-viewport">
                    <div
                        id="team-track"
                        class="flex"
                        style="gap: 16px; transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1); will-change: transform;"
                    >
                        @foreach(config('site.team') as $member)
                            <div class="team-card-item flex-none shrink-0">
                                <x-team-card :member="$member" />
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Navigasi Carousel --}}
                <div class="mt-8 flex items-center justify-center gap-6">
                    <button
                        id="team-prev"
                        aria-label="Foto sebelumnya"
                        class="flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50 disabled:cursor-not-allowed disabled:opacity-40"
                    >
                        ← Sebelumnya
                    </button>

                    <div id="team-dots" class="flex items-center gap-2"></div>

                    <button
                        id="team-next"
                        aria-label="Foto selanjutnya"
                        class="flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50 disabled:cursor-not-allowed disabled:opacity-40"
                    >
                        Selanjutnya →
                    </button>
                </div>
            </div>
        </div>

        {{-- Perjalanan Kami --}}
        <div class="mt-20">
            <h2 class="text-3xl font-bold text-center">Perjalanan Kami</h2>
            <div class="mt-12 space-y-8 max-w-2xl mx-auto">
                @foreach([
                    ['year' => '2020', 'title' => 'Berdiri', 'desc' => 'Memulai sebagai distributor sensor pertanian lokal.'],
                    ['year' => '2022', 'title' => 'Ekspansi Peternakan', 'desc' => 'Meluncurkan lini produk monitoring kandang.'],
                    ['year' => '2024', 'title' => 'Platform IoT', 'desc' => 'Integrasi aplikasi mobile untuk semua produk.'],
                    ['year' => '2026', 'title' => 'Nasional', 'desc' => 'Melayani ribuan petani di seluruh Indonesia.'],
                ] as $item)
                    <div class="flex gap-6">
                        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-brand-500 text-lg font-bold text-white">{{ $item['year'] }}</div>
                        <div>
                            <h3 class="text-xl font-bold">{{ $item['title'] }}</h3>
                            <p class="mt-1 text-lg text-gray-600">{{ $item['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

@include('partials.cta')
@endsection

@push('scripts')
<script>
window.addEventListener('load', function () {
    requestAnimationFrame(function () {
        initTeamCarousel();
    });
});

function initTeamCarousel() {
    var outer    = document.getElementById('team-outer');
    var track    = document.getElementById('team-track');
    var dotsEl   = document.getElementById('team-dots');
    var prevBtn  = document.getElementById('team-prev');
    var nextBtn  = document.getElementById('team-next');
    var cards    = Array.from(track.querySelectorAll('.team-card-item'));

    var GAP      = 16;
    var total    = cards.length;
    var current  = 0;
    var VISIBLE  = getVisible();

    // Berapa kartu tampil: 2 di mobile (<640px), 4 di desktop
    function getVisible() {
        return outer.offsetWidth < 640 ? 2 : 4;
    }

    function setCardWidths() {
        VISIBLE        = getVisible();
        var outerW     = outer.offsetWidth;
        var cardW      = (outerW - GAP * (VISIBLE - 1)) / VISIBLE;
        cards.forEach(function (card) {
            card.style.width = cardW + 'px';
        });
    }

    function getMax() {
        return Math.max(total - VISIBLE, 0);
    }

    function buildDots() {
        var max = getMax();
        dotsEl.innerHTML = '';
        for (var i = 0; i <= max; i++) {
            (function (idx) {
                var dot = document.createElement('div');
                dot.style.cssText = 'width:8px;height:8px;border-radius:9999px;cursor:pointer;transition:background 0.2s,transform 0.2s;background:#D1D5DB;';
                dot.addEventListener('click', function () { goTo(idx); });
                dotsEl.appendChild(dot);
            })(i);
        }
    }

    function goTo(idx) {
        var max    = getMax();
        current    = Math.max(0, Math.min(idx, max));

        var cardW  = cards[0] ? cards[0].offsetWidth : 0;
        var offset = current * (cardW + GAP);
        track.style.transform = 'translateX(-' + offset + 'px)';

        prevBtn.disabled = current === 0;
        nextBtn.disabled = current === max;

        Array.from(dotsEl.children).forEach(function (dot, i) {
            dot.style.background = i === current ? '#16A34A' : '#D1D5DB';
            dot.style.transform  = i === current ? 'scale(1.35)' : 'scale(1)';
        });
    }

    prevBtn.addEventListener('click', function () { goTo(current - 1); });
    nextBtn.addEventListener('click', function () { goTo(current + 1); });

    window.addEventListener('resize', function () {
        setCardWidths();
        buildDots();
        // Jika current melebihi max baru (karena VISIBLE bertambah), reset ke max
        if (current > getMax()) current = getMax();
        goTo(current);
    });

    // Inisialisasi
    setCardWidths();
    buildDots();
    goTo(0);
}
</script>
@endpush