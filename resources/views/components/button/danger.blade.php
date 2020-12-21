@php
    $classes = 'p-2 rounded bg-red-600 text-gray-100 hover:text-red-100 hover:bg-red-700 transition ease-in-out duration-300';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
