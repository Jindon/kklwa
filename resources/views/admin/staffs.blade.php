<x-app-layout>
    <div class="flex flex-col md:flex-row md:justify-between items-start md:items-center mb-6">
        <div class="md:w-3/5">
            <x-section-title
                title="Staffs"
                description="Manage staff members"
            />
        </div>

        <div class="flex w-full space-x-3">
            <div class="flex-1">
                <x-input.text type="text" placeholder="Search staffs.."/>
            </div>
            <div class="">
                <x-button.primary>
                    <x-heroicon-o-plus class="w-6 h-6"/>
                </x-button.primary>
            </div>
        </div>
    </div>

    <div class="overflow-hidden overflow-x-auto">
        <x-table>
            <x-slot name="head">
                <x-table.heading>Photo</x-table.heading>
                <x-table.heading>Name</x-table.heading>
                <x-table.heading>Address</x-table.heading>
                <x-table.heading>Edn. Qlfn.</x-table.heading>
                <x-table.heading>Designation</x-table.heading>
                <x-table.heading>Appointed on</x-table.heading>
                <x-table.heading>Actions</x-table.heading>
            </x-slot>
            <x-slot name="body">
                @forelse([1,2,3,4,5,6,7,8,9,10] as $index)
                    <x-table.row class="{{ $index % 2 !== 0 ? 'bg-white' : '' }}">
                        <x-table.cell><img src="/images/staff.jpg" alt="staff" class="w-20 h-auto"></x-table.cell>
                        <x-table.cell>Khagembam Surchand Singh</x-table.cell>
                        <x-table.cell>Kumbi Bazar Ward no. 7</x-table.cell>
                        <x-table.cell>Graduate</x-table.cell>
                        <x-table.cell>Superintendent</x-table.cell>
                        <x-table.cell>02-04-2020</x-table.cell>
                        <x-table.cell>
                            <div class="flex items-center space-x-2">
                                <x-button.primary>
                                    <x-heroicon-o-pencil class="w-4 h-4"/>
                                </x-button.primary>
                                <x-button.danger>
                                    <x-heroicon-o-trash class="w-4 h-4"/>
                                </x-button.danger>
                            </div>
                        </x-table.cell>
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
</x-app-layout>
