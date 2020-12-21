@props([
    'label' => null,
    'for',
    'error',
    'required' => false,
])

<div {{ $attributes }}>
    @if($label)
        <label class="text-sm font-bold text-gray-600" for="{{ $for }}">
            {{ $label }} @if($required)<span class="text-red-500">*</span>@endif
        </label>
    @endif

    {{ $slot }}
    @isset($error)
        <span class="pt-1 text-sm text-red-500">{{ $error }}</span>
    @endisset
</div>
