<x-website-layout>

    {{-- Gallery section --}}
    <div x-data="{ selectedImage: null }">
        <div class="max-w-6xl mx-auto px-3 md:px-6 py-12 md:py-24 space-y-6 md:space-y-12">
            <x-section-title
                title="Gallery"
                description="Out photo gallery"
            />

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                @foreach([1,2,3,4,5,6,7,8,9] as $i)
                    <div
                        @click="selectedImage = '{{ asset('images/gallery.jpg') }}'"
                        class="w-full h-56 bg-gray-100 shadow-lg cursor-pointer"
                        style="background: url('{{ asset('images/gallery.jpg') }}'); background-repeat: no-repeat; background-position: center; background-size: cover;"
                    >
                    </div>
                @endforeach
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
            class="fixed flex justify-center z-40 top-0 right-0 left-0"
        >
            <div class="relative max-w-lg bg-transparent mt-12" @click.away="selectedImage = null">
                <img :src="selectedImage" alt="" class="rounded-lg">

                <button x-show="selectedImage" @click="selectedImage = null" class="absolute top-0 right-0 mt-2 mr-2 p-1 bg-black bg-opacity-50 text-red-500">
                    <x-heroicon-o-x class="w-6 h-6"/>
                </button>
            </div>
        </div>

        <div x-show="selectedImage" class="fixed flex justify-center z-10 top-0 right-0 left-0 w-screen h-screen bg-black bg-opacity-50"></div>
    </div>

</x-website-layout>
