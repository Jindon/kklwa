@php
    $classes = 'p-2 rounded bg-green-600 text-gray-100 hover:text-green-100 hover:bg-green-700 transition ease-in-out duration-300';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
