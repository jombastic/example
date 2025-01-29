@props(['active' => false, 'type' => 'a'])

@php
    $classes = 'rounded-md px-3 py-2 text-sm font-medium ';
    $classes .= $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white';
@endphp

@if ($type === 'a')
    <a aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
