<x-website-layout>
    {{-- Carousel section --}}
    <div>
        @include('website.sections.slider')
    </div>

    {{-- About section --}}
    <div id="about" class="max-w-6xl mx-auto">
        <div class="px-3 md:px-6 py-12 md:py-24">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-6 md:space-y-0">
                <div class="w-full md:w-6/12 space-y-6">
                    <h1 class="text-2xl md:text-4xl font-bold text-green-700">About us</h1>

                    <div>
                        <p class="text-base mb-2">
                            The Kumbi Khullakpam Leikai Women’s Association, Kumbi is a registered body registered under Societies Registration Act 1860, bearing Registration No. 8/B of 1986 and FC ( R ) A No. 194190007. The organization has experience in the field of Social Welfare services, Family Welfare services, Community Health and Environmental and other seminars and workshop, Health Mela, Camps, Training and Awareness Meeting for the last 35 years.
                        </p>
                        <p class="text-base">
                            It is a pure voluntary social welfare organization for bringing all round development and care of elder person, poor weaker section and rural poor women and backward classes of the society living in the Bishnupur District, Manipur and more particularly those residing in the areas Jurisdiction of the association of uplifting the socio-economic conditions of rural poor people, none-residential school, unemployed youth, specially for rural women and children and old aged etc.
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-6/12 flex justify-end">
                    <img src="/images/about_image.jpg" alt="" class="rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </div>

    {{-- Staffs Section --}}
    <div id="staffs" class="bg-gray-100">
        <div class="max-w-6xl mx-auto px-3 md:px-6 py-12 md:py-24 space-y-6 md:space-y-12">
            <h1 class="text-2xl md:text-4xl font-bold text-green-700 text-center">Our staffs</h1>

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
                        @forelse([1,2,3,4,5,6,7,8,9,10] as $index)
                            <x-table.row class="{{ $index % 2 !== 0 ? 'bg-green-100' : '' }}">
                                <x-table.cell><img src="/images/staff.jpg" alt="staff" class="w-20 h-auto"></x-table.cell>
                                <x-table.cell>Khagembam Surchand Singh</x-table.cell>
                                <x-table.cell>Kumbi Bazar Ward no. 7</x-table.cell>
                                <x-table.cell>Graduate</x-table.cell>
                                <x-table.cell>Superintendent</x-table.cell>
                                <x-table.cell>02-04-2020</x-table.cell>
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
    <div class="max-w-6xl mx-auto px-3 md:px-6 py-12 md:py-24 space-y-6 md:space-y-12">
        <h1 class="text-2xl md:text-4xl font-bold text-green-700 text-center">Gallery</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach([1,2,3] as $i)
                <div class="w-full h-64 bg-gray-100 rounded-lg shadow-lg" style="background: url('{{ asset('images/gallery.jpg') }}'); background-repeat: no-repeat; background-position: center; background-size: cover;">
                </div>
            @endforeach
        </div>

        <div class="w-full flex justify-center">
            <button class="px-5 py-3 rounded-lg font-bold text-lg shadow-lg bg-green-500 text-gray-100 hover:bg-green-700 hover:text-green-100 transition duration-150 ease-in-out">See more</button>
        </div>
    </div>
</x-website-layout>
