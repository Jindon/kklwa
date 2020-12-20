@props(['active'])

@php
$classes = ($active ?? false)
            ? 'font-bold text-green-600 hover:text-green-800 focus:outline-none focus:text-green-700 transition duration-150 ease-in-out'
            : 'font-bold text-gray-600 hover:text-green-600 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
