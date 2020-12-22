<x-website-layout>
    {{-- Carousel section --}}
    <div>
        @include('website.sections.slider')
    </div>

    {{-- About section --}}
    <div id="about" class="max-w-6xl mx-auto">
        <div class="px-3 py-12 md:px-6 md:py-24">
            <div class="flex flex-col space-y-6 md:flex-row md:justify-between md:items-center md:space-y-0">
                <div class="w-full space-y-6 md:w-6/12">
                    <h1 class="text-2xl font-bold text-green-700 md:text-4xl">About us</h1>

                    <div class="">
                        {!! $about->content !!}
                    </div>
                </div>
                <div class="flex justify-end w-full md:w-6/12">
                    <img src="{{ $about->imageUrl }}" alt="" class="rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </div>

    {{-- Staffs Section --}}
    <div id="staffs" class="bg-gray-100">
        <div class="max-w-6xl px-3 py-12 mx-auto space-y-6 md:px-6 md:py-24 md:space-y-12">
            <h1 class="text-2xl font-bold text-center text-green-700 md:text-4xl">Our staffs</h1>

            <div class="overflow-hidden overflow-x-auto">
                <x-table>
                    <x-slot name="head">
                        <x-table.heading>Photo</x-table.heading>
                        <x-table.heading>Name</x-table.heading>
                        <x-table.heading>Address</x-table.heading>
                        <x-table.heading>Edn. Qlfn.</x-table.heading>
                        <x-table.heading>Designation</x-table.heading>
                        <x-table.heading>Date of appointment</x-table.heading>
                    </x-slot>
                    <x-slot name="body">
                        @forelse($staffs as $index => $staff)
                            <x-table.row class="{{ $index % 2 !== 0 ? 'bg-green-100' : '' }}">
                                <x-table.cell><img src="{{ $staff->photoUrl }}" alt="{{ $staff->name }}" class="w-20 h-auto"></x-table.cell>
                                <x-table.cell>{{ $staff->name }}</x-table.cell>
                                <x-table.cell>{{ $staff->address }}</x-table.cell>
                                <x-table.cell>{{ $staff->edu_qualification }}</x-table.cell>
                                <x-table.cell>{{ $staff->designation }}</x-table.cell>
                                <x-table.cell>{{ $staff->DoaDate() }}</x-table.cell>
                            </x-table.row>
                        @empty
                            <x-table.row>
                                <x-table.cell colspan="8">
                                    <div class="flex justify-center w-full py-10 text-gray-500">
                                        No staff found..
                                    </div>
                                </x-table.cell>
                            </x-table.row>
                        @endforelse
                    </x-slot>
                </x-table>
            </div>
        </div>
    </div>

    {{-- Gallery section --}}
    <div class="max-w-6xl px-3 py-12 mx-auto space-y-6 md:px-6 md:py-24 md:space-y-12">
        <h1 class="text-2xl font-bold text-center text-green-700 md:text-4xl">Gallery</h1>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            @foreach($galleryPhotos as $galleryPhoto)
                <div class="w-full h-64 bg-gray-100 rounded-lg shadow-lg" style="background: url('{{ $galleryPhoto->photoUrl }}'); background-repeat: no-repeat; background-position: center; background-size: cover;">
                </div>
            @endforeach
        </div>

        <div class="flex justify-center w-full">
            <a href="{{ route('website.gallery') }}" class="px-5 py-3 text-lg font-bold text-gray-100 transition duration-150 ease-in-out bg-green-500 rounded-lg shadow-lg hover:bg-green-700 hover:text-green-100">See more</a>
        </div>
    </div>
</x-website-layout>
