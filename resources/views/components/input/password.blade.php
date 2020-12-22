@php
    $classes = 'w-full border-gray-300 placeholder-gray-300 focus:outline-green-500 focus:ring-green-500 focus:bg-gray-100 rounded';
@endphp

<input type="password" {{ $attributes->merge(['class' => $classes]) }}>
