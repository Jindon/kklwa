@php
    $classes = 'w-full p-2 placeholder-gray-300 border border-gray-300 rounded focus:outline-green-500 focus:bg-gray-100 focus:ring-green-500';
@endphp

<textarea {{ $attributes->merge(['class' => $classes]) }}></textarea>
