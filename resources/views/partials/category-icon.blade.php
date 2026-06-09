@php
$icon = $icon ?? 'sensor';
@endphp

@if(str_starts_with($icon, 'http'))
    <img src="{{ $icon }}" class="h-10 w-10 rounded object-cover">
@else
<svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
    @switch($icon)
        @case('temperature')
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9a3 3 0 100 6m-3-2a3 3 0 106 0m-3-2V5a2 2 0 114 0v6m-3 2a5 5 0 1010 0"/>
            @break
        @case('humidity')
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c-4 6-8 8-8 13a8 8 0 1016 0c0-5-4-7-8-13z"/>
            @break
        @case('ph')
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            @break
        @case('barn')
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            @break
        @case('pond')
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-6l1.586-1.586a2 2 0 012.828 0L20 12"/>
            @break
        @case('pump')
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
            @break
        @default
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"/>
    @endswitch
</svg>
@endif