<section class="bg-gray-50 py-20 dark:bg-gray-900" x-data="{ open: null }">
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
        <h2 class="text-center text-3xl font-bold sm:text-4xl">Pertanyaan Umum</h2>
        <p class="mt-4 text-center text-lg text-gray-600 dark:text-gray-400">Jawaban singkat untuk pertanyaan yang sering ditanyakan</p>

        <div class="mt-12 space-y-4">
            @foreach([
                ['q' => 'Apakah produk mudah dipasang sendiri?', 'a' => 'Ya, semua produk kami dirancang plug-and-play dengan panduan bahasa Indonesia. Tim kami siap bantu via WhatsApp jika diperlukan.'],
                ['q' => 'Bagaimana cara memesan produk?', 'a' => 'Cukup klik tombol WhatsApp di halaman produk, tim kami akan memandu proses pemesanan tanpa checkout rumit.'],
                ['q' => 'Apakah ada garansi?', 'a' => 'Semua produk bergaransi resmi 1 tahun. Klaim garansi dapat dilakukan melalui WhatsApp atau email.'],
                ['q' => 'Bisakah dipantau lewat HP?', 'a' => 'Ya, sebagian besar produk terhubung ke aplikasi smartphone untuk pemantauan realtime.'],
            ] as $index => $faq)
                <div data-animate-card class="rounded-2xl bg-white shadow-md dark:bg-gray-800">
                    <button @click="open = open === {{ $index }} ? null : {{ $index }}"
                            class="flex w-full items-center justify-between px-6 py-5 text-left text-lg font-semibold">
                        {{ $faq['q'] }}
                        <svg class="h-6 w-6 transition" :class="open === {{ $index }} && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open === {{ $index }}" x-transition x-cloak class="px-6 pb-5 text-lg text-gray-600 dark:text-gray-400">
                        {{ $faq['a'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
