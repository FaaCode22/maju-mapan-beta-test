@props(['product'])

<article class="group flex flex-col overflow-hidden rounded-2xl bg-white shadow-lg transition duration-300 hover:scale-[1.02] hover:shadow-xl">
    <a href="{{ route('products.show', $product) }}" class="relative aspect-[4/3] overflow-hidden bg-brand-50">
        <img src="{{ $product->thumbnail_url }}" alt="{{ $product->name }}" loading="lazy"
             class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
        <span class="absolute left-3 top-3 rounded-lg bg-white/90 px-3 py-1 text-sm font-medium text-brand-700">{{ $product->category->name }}</span>
    </a>
    <div class="flex flex-1 flex-col p-6">
        <h3 class="text-xl font-bold leading-snug">
            <a href="{{ route('products.show', $product) }}" class="hover:text-brand-600">{{ $product->name }}</a>
        </h3>
        <p class="mt-2 flex-1 text-base text-gray-600 line-clamp-2">{{ $product->short_description }}</p>
        <p class="mt-4 text-2xl font-bold text-brand-600">{{ $product->formatted_price }}</p>
        <div class="mt-4 flex flex-col gap-2 sm:flex-row">
            <a href="{{ route('products.show', $product) }}"
               class="flex-1 rounded-xl border-2 border-brand-500 py-3 text-center text-lg font-semibold text-brand-600 transition hover:bg-brand-50">
                Detail
            </a>
            <a href="{{ \App\Support\WhatsappHelper::url(\App\Support\WhatsappHelper::orderMessage($product->name)) }}"
               target="_blank" rel="noopener"
               class="flex-1 rounded-xl bg-brand-500 py-3 text-center text-lg font-semibold text-white transition hover:bg-brand-600">
                WhatsApp
            </a>
        </div>
    </div>
</article>
