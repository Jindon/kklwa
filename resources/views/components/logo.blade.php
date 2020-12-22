@props(['onlyLogo' => false])

<div class="flex items-center space-x-0 md:space-x-3">
    {{-- <span class="p-4 text-center text-green-700 bg-green-200 rounded">Logo</span> --}}
    <div class="w-auto h-12 overflow-auto rounded">
        <img src="{{ $logoUrl }}" alt="Staff photo" class="w-auto h-12">
    </div>
    @unless($onlyLogo)
        <div class="hidden w-56 text-sm font-black leading-4 text-green-700 uppercase md:block">{{ $sitename }}</div>
    @endunless
</div>
