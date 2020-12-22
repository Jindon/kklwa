@props(['initialValue' => ''])

<div
    wire:ignore
    wire:key='trixUniqueKey'
    {{ $attributes }}
    x-data
    @trix-blur="$dispatch('change', $event.target.value)"
>
    <input id="x" value="{{ $initialValue }}" type="hidden">
    <trix-editor class="trix-content" input="x" class="border border-gray-300 rounded"></trix-editor>
</div>

