@props(['name', 'role', 'quote', 'initials'])

<div class="rounded-2xl bg-white p-8 shadow-lg dark:bg-gray-900">
    <div class="flex items-center gap-4">
        <div class="flex h-14 w-14 items-center justify-center rounded-full bg-brand-100 text-xl font-bold text-brand-700">{{ $initials }}</div>
        <div>
            <p class="text-lg font-bold">{{ $name }}</p>
            <p class="text-base text-gray-500">{{ $role }}</p>
        </div>
    </div>
    <p class="mt-6 text-lg leading-relaxed text-gray-600 dark:text-gray-400">"{{ $quote }}"</p>
    <div class="mt-4 flex text-accent-500">
        @for($i = 0; $i < 5; $i++)
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
        @endfor
    </div>
</div>
