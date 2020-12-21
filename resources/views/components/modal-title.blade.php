@props(['title', 'description' => NULL])

<div {{ $attributes }}>
    <h1 class="text-xl font-bold text-green-700 md:text-2xl">{{ $title }}</h1>
    @if($description)
        <p class="text-gray-500">{{ $description }}</p>
    @endif
</div>
