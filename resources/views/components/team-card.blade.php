@props(['member'])

<div class="group overflow-hidden rounded-2xl bg-white shadow-lg transition duration-300 hover:scale-[1.02] hover:shadow-xl">
    <div class="aspect-[4/5] overflow-hidden bg-brand-100">
        <img src="{{ asset($member['photo']) }}" alt="{{ $member['name'] }}"
             class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
             loading="lazy"
             onerror="this.src='{{ asset('images/team/placeholder.svg') }}'">
    </div>
    <div class="p-6 text-center">
        <h3 class="text-xl font-bold">{{ $member['name'] }}</h3>
        <p class="mt-1 text-base font-medium text-brand-600">{{ $member['role'] }}</p>
    </div>
</div>
