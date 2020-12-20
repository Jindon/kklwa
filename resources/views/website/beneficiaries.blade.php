<x-website-layout>

    {{-- Beneficiaries Section --}}
    <div id="staffs" class="bg-white">
        <div class="max-w-6xl mx-auto px-3 md:px-6 py-12 md:py-24 space-y-6 md:space-y-12">
            <div class="flex flex-col md:flex-row justify-between space-y-4 md:space-y-0 items-start md:items-center">
                <x-section-title
                    title="Beneficiaries"
                    description="Our beneficiaries for Nov, 2020"
                />

                <div class="w-64">
                    <x-input.select>
                        <option>Nov, 2020</option>
                        <option>Dec, 2020</option>
                        <option>Jan, 2020</option>
                    </x-input.select>
                </div>
            </div>

            <div class="overflow-hidden overflow-x-auto">
                <x-table>
                    <x-slot name="head">
                        <x-table.heading>Name</x-table.heading>
                        <x-table.heading>S/o, W/o, D/o</x-table.heading>
                        <x-table.heading>D.O.B</x-table.heading>
                        <x-table.heading>Gender</x-table.heading>
                        <x-table.heading>Category</x-table.heading>
                        <x-table.heading>Address</x-table.heading>
                        <x-table.heading>Education</x-table.heading>
                        <x-table.heading>D.O.E</x-table.heading>
                    </x-slot>
                    <x-slot name="body">
                        @forelse([1,2,3,4,5,6,7,8,9,10] as $index)
                            <x-table.row class="{{ $index % 2 !== 0 ? 'bg-green-100' : '' }}">
                                <x-table.cell class="font-bold">Haobijam Jati Devi</x-table.cell>
                                <x-table.cell>(L) H.Kul Singh</x-table.cell>
                                <x-table.cell>01-03-1958</x-table.cell>
                                <x-table.cell>Female</x-table.cell>
                                <x-table.cell>OBC</x-table.cell>
                                <x-table.cell>Taobungkhok</x-table.cell>
                                <x-table.cell>ILT</x-table.cell>
                                <x-table.cell>02-04-2020</x-table.cell>
                            </x-table.row>
                        @empty
                            <x-table.row>
                                <x-table.cell colspan="8">
                                    <div class="flex justify-center w-full py-10 text-gray-500">
                                        No beneficiaries found..
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
