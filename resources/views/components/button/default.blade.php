@php
    $classes = 'p-2 text-gray-600 transition duration-300 ease-in-out bg-gray-100 rounded hover:text-gray-700 hover:bg-gray-200';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
