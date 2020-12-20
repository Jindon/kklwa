@props(['title', 'description' => NULL])

<div {{ $attributes }}>
    <h1 class="text-2xl md:text-4xl font-bold text-green-700">{{ $title }}</h1>
    @if($description)
        <p class="text-gray-500">{{ $description }}</p>
    @endif
</div>
