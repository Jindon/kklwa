<x-website-layout meta-title="Gallery">

    {{-- Gallery section --}}
    <div x-data="{ selectedImage: null }">
        <div class="max-w-6xl px-3 py-12 mx-auto space-y-6 md:px-6 md:py-24 md:space-y-12">
            <x-section-title
                title="Gallery"
                description="Out photo gallery"
            />

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4">
                @foreach($galleryPhotos as $index=>$galleryPhoto)
                    <div
                        @click="selectedImage = '{{ $galleryPhoto->photoUrl }}'"
                        class="w-full h-56 bg-gray-100 shadow-lg cursor-pointer"
                        style="background: url('{{ $galleryPhoto->photoUrl }}'); background-repeat: no-repeat; background-position: center; background-size: cover;"
                    >
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $galleryPhotos->links() }}
            </div>
        </div>

        <div x-show="selectedImage"
            @click.away="selectedImage = null"
            x-transition:enter="transform transition ease-in-out duration-300"
            x-transition:enter-start="-translate-y-full"
            x-transition:enter-end="translate-y-0"
            x-transition:leave="transform transition ease-in-out duration-300"
            x-transition:leave-start="translate-y-0"
            x-transition:leave-end="-translate-y-full"
            class="fixed top-0 left-0 right-0 z-40 flex justify-center"
            x-cloak
        >
            <div class="relative max-w-lg mt-12 bg-transparent" @click.away="selectedImage = null">
                <img :src="selectedImage" alt="" class="rounded-lg">

                <button x-show="selectedImage" @click="selectedImage = null" class="absolute top-0 right-0 p-1 mt-2 mr-2 text-red-500 bg-black bg-opacity-50">
                    <x-heroicon-o-x class="w-6 h-6"/>
                </button>
            </div>
        </div>

        <div x-show="selectedImage" class="fixed top-0 left-0 right-0 z-10 flex justify-center w-screen h-screen bg-black bg-opacity-50"></div>
    </div>

</x-website-layout>
