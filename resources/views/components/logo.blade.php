@props(['onlyLogo' => false])

<div class="flex items-center space-x-0 md:space-x-3">
    <span class="bg-green-200 text-green-700 p-4 text-center rounded">Logo</span>
    @unless($onlyLogo)
        <div class="hidden md:block w-40 leading-4 uppercase text-sm font-black text-green-700">Kumbi Khullakpam Leikai Women's Association</div>
    @endunless
</div>
