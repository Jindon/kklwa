<x-website-layout>

    {{-- Beneficiaries Section --}}
    <div class="bg-white">
        <div class="max-w-6xl px-3 py-12 mx-auto space-y-6 md:px-6 md:py-24 md:space-y-12">
            <div class="flex flex-col items-start justify-between space-y-4 md:flex-row md:space-y-0 md:items-center">
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
                                {{-- <x-table.cell>
                                    <div class="flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100 rounded-lg">
                                        @if ($staff->photo)
                                            <img src="{{ $staff->photoUrl }}" alt="Staff photo" class="w-auto h-20">
                                        @else
                                            <div class="text-gray-300"><x-heroicon-o-user class="w-10 h-10"/></div>
                                        @endif
                                    </div>
                                </x-table.cell> --}}
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
