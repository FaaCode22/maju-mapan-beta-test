@php
    $slides = config('site.banners');
@endphp

<section class="relative w-full overflow-hidden" style="height: calc(100dvh - var(--navbar-height, 0px))" x-data="heroSlider({{ count($slides) }})" x-init="start()">
    @foreach($slides as $index => $slide)
        <div class="absolute inset-0 transition-opacity duration-700 ease-in-out"
             :class="current === {{ $index }} ? 'opacity-100 z-10' : 'opacity-0 z-0'">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset($slide['image']) }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-brand-900/60 to-black/40"></div>
            <div class="relative z-10 flex h-full items-center">
                <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="max-w-2xl text-white">
                        <span class="inline-block rounded-full bg-white/20 px-4 py-2 text-base font-medium backdrop-blur-sm">
                            Smart Farming Indonesia
                        </span>
                        <h1 class="mt-6 text-4xl font-bold leading-tight sm:text-5xl lg:text-6xl">
                            {{ $slide['title'] }}
                        </h1>
                        <p class="mt-6 text-xl leading-relaxed text-gray-100 sm:text-2xl">
                            {{ $slide['subtitle'] }}
                        </p>
                        <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                            <a href="{{ url($slide['cta_url']) }}"
                               class="rounded-2xl bg-brand-500 px-8 py-4 text-center text-xl font-semibold text-white shadow-lg transition hover:scale-105 hover:bg-brand-600">
                                {{ $slide['cta_text'] }}
                            </a>
                            <a href="{{ \App\Support\WhatsappHelper::url($slide['cta_secondary_whatsapp'] ?? '') }}"
                               target="_blank" rel="noopener"
                               class="rounded-2xl border-2 border-white bg-white/10 px-8 py-4 text-center text-xl font-semibold text-white backdrop-blur-sm transition hover:scale-105 hover:bg-white/20">
                                {{ $slide['cta_secondary_text'] }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <button @click="prev()" class="absolute left-4 top-1/2 z-20 flex h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/20 text-white backdrop-blur-sm transition hover:bg-white/40 sm:left-6" aria-label="Slide sebelumnya">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button @click="next()" class="absolute right-4 top-1/2 z-20 flex h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/20 text-white backdrop-blur-sm transition hover:bg-white/40 sm:right-6" aria-label="Slide berikutnya">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </button>

    <div class="absolute bottom-8 left-1/2 z-20 flex -translate-x-1/2 gap-2">
        @foreach($slides as $index => $slide)
            <button @click="goTo({{ $index }})"
                    class="h-3 rounded-full transition-all"
                    :class="current === {{ $index }} ? 'w-8 bg-white' : 'w-3 bg-white/50'"
                    aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
</section>
