@props([
    'name' => NULL,
    'value' => NULL,
])

<label class="inline-flex items-center">
    <input type="radio" name="{{ $name }}" value="{{ $value }}" checked>
    <span class="ml-2">{{ $slot }}</span>
</label>
