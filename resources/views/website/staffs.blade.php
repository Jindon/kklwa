<x-website-layout>

    {{-- Beneficiaries Section --}}
    <div class="bg-white">
        <div class="max-w-6xl mx-auto px-3 md:px-6 py-12 md:py-24 space-y-6 md:space-y-12">
            <div class="flex flex-col md:flex-row justify-between space-y-4 md:space-y-0 items-start md:items-center">
                <x-section-title
                    title="Staffs"
                    description="Our staff members"
                />
            </div>

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

</x-website-layout>
