@props([
    'inputWidth' => 'full',
])
<div class="w-{{$inputWidth}}">
    <select
        {{ $attributes }}
        class="w-full p-3 leading-none border border-gray-300 rounded-sm appearance-none focus:outline-green-500 focus:bg-white focus:border-gray-400 focus:ring-green-500"
    >
        {{ $slot }}
    </select>
</div>
