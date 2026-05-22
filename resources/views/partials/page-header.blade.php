@props(['title', 'subtitle' => null, 'image'])

<section class="relative flex min-h-[320px] items-center justify-center overflow-hidden sm:min-h-[380px]">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset($image) }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-brand-900/85 via-brand-800/75 to-brand-900/60"></div>
    <div class="relative mx-auto max-w-7xl px-4 py-20 text-center sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-white sm:text-5xl">{{ $title }}</h1>
        @if($subtitle)
            <p class="mx-auto mt-4 max-w-2xl text-xl text-brand-100">{{ $subtitle }}</p>
        @endif
    </div>
</section>
