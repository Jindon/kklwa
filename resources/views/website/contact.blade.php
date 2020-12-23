<x-website-layout meta-title="Contact">

    {{-- Beneficiaries Section --}}
    <div class="bg-white">
        <div class="max-w-6xl px-3 py-12 mx-auto space-y-6 md:px-6 md:py-24 md:space-y-12">
            <div class="flex flex-col items-start justify-between space-y-4 md:flex-row md:space-y-0 md:items-center">
                <x-section-title
                    title="Contact"
                    description="Contact us using the details below"
                />
            </div>

            <div class="space-y-3">
                <div class="flex space-x-2">
                    <x-heroicon-o-map class="w-6 h-6 text-green-700"/>
                    <p class="font-bold text-gray-600">{{ $address }}</p>
                </div>
                <div class="flex space-x-2">
                    <x-heroicon-o-phone class="w-6 h-6 text-green-700"/>
                    <p class="font-bold text-gray-600">{{ $telephone }}</p>
                </div>
                <div class="flex space-x-2">
                    <x-heroicon-o-device-tablet class="w-6 h-6 text-green-700"/>
                    <p class="font-bold text-gray-600">{{ $phone }}</p>
                </div>
                <div class="flex space-x-2">
                    <x-heroicon-o-mail class="w-6 h-6 text-green-700"/>
                    <p class="font-bold text-gray-600">{{ $email }}</p>
                </div>
            </div>

            @if(config('app.map_embed_url'))
                <div class="">
                    <iframe
                        class="w-full rounded-lg shadow-lg h-96"
                        src="{{ config('app.map_embed_url') }}"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    ></iframe>
                </div>
            @endif

        </div>
    </div>

</x-website-layout>
