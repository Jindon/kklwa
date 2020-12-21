<div>
    <div class="flex flex-col items-start mb-6 md:flex-row md:justify-between md:items-center">
        <div class="md:w-3/5">
            <x-section-title
                title="Staffs"
                description="Manage staffs"
            />
        </div>

        <div class="flex w-full space-x-3">
            <div class="flex-1">
                <x-input.text type="text" wire:model="search" placeholder="Search staffs.."/>
            </div>
            <div class="">
                <x-button.primary wire:click="openForm">
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
                <x-table.heading>Date of appointment</x-table.heading>
                <x-table.heading>Actions</x-table.heading>
            </x-slot>
            <x-slot name="body">
                @forelse($staffs as $index=>$staff)
                    <x-table.row class="{{ $index % 2 !== 0 ? 'bg-white' : '' }}" wire:loading.class.delay="opacity-50" wire:key='staff-{{ $staff->id }}'>
                        <x-table.cell>
                            <div class="flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100 rounded-lg">
                                @if ($staff->photo)
                                    <img src="{{ $staff->photoUrl }}" alt="Staff photo" class="w-auto h-20">
                                @else
                                    <div class="text-gray-300"><x-heroicon-o-user class="w-10 h-10"/></div>
                                @endif
                            </div>
                        </x-table.cell>
                        <x-table.cell class="font-bold">{{ $staff->name }}</x-table.cell>
                        <x-table.cell>{{ $staff->address }}</x-table.cell>
                        <x-table.cell>{{ $staff->edu_qualification }}</x-table.cell>
                        <x-table.cell>{{ $staff->designation }}</x-table.cell>
                        <x-table.cell>{{ $staff->DoaDate() }}</x-table.cell>
                        <x-table.cell>
                            <div class="flex items-center space-x-2">
                                <x-button.primary wire:click="openForm({{ $staff }})">
                                    <x-heroicon-o-pencil class="w-4 h-4"/>
                                </x-button.primary>
                                <x-button.danger wire:click="confirmDelete({{ $staff }})">
                                    <x-heroicon-o-trash class="w-4 h-4"/>
                                </x-button.danger>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="7">
                            <div class="flex justify-center w-full py-10 text-gray-500">
                                No staffs found..
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-table>

        <div class="mt-4">
            {{ $staffs->links() }}
        </div>
    </div>

    <!-- Beneficiaries form modal -->
    <div>
        <x-modal wire:model="showForm" max-width="xl">
            <div class="flex items-start justify-between p-4 md:p-6">
                <x-modal-title
                    title="{{ __('Save staff') }}"
                    description="{{ __('Add / edit staff') }}"
                />
                <div>
                    <x-button.danger wire:click="closeForm"><x-heroicon-o-x class="w-4 h-4"/></x-button.danger>
                </div>
            </div>
            <div class="p-4 border-t md:p-6">
                <form wire:submit.prevent="save">
                    <div class="grid gap-3 grids-cols-1 md:grids-cols-2">
                        <div class="md:col-span-2">
                            <x-input.group label="Staff name" for="name" required :error="$errors->first('staff.name')">
                                <x-input.text wire:model="staff.name" id="name" placeholder="Enter staff name" required></x-input.text>
                            </x-input.group>
                        </div>

                        <div>
                            <x-input.group label="Educational Qualification" for="edu_qualification" required :error="$errors->first('staff.edu_qualification')">
                                <x-input.text wire:model="staff.edu_qualification" id="edu_qualification" placeholder="Eucational qualification" required></x-input.text>
                            </x-input.group>
                        </div>

                        <div>
                            <x-input.group label="Designation" for="designation" required :error="$errors->first('staff.designation')">
                                <x-input.text wire:model="staff.designation" id="designation" placeholder="Designation" required></x-input.text>
                            </x-input.group>
                        </div>

                        <div class="md:col-span-2">
                            <x-input.group label="Address" for="address" required :error="$errors->first('staff.address')">
                                <x-input.text wire:model="staff.address" id="address" placeholder="Enter address" required></x-input.text>
                            </x-input.group>
                        </div>

                        <div>
                            <x-input.group label="Date of appointment" for="doa" required :error="$errors->first('staff.doe')">
                                <x-input.date wire:model="staff.doa" id="doa" />
                            </x-input.group>
                        </div>

                        <div class="flex flex-col space-y-4 md:col-span-2 md:flex-row md:space-x-4 md:space-y-0">
                            <div>
                                <div class="flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100 rounded-lg md:mt-6">
                                    @if ($photo)
                                        <img src="{{ $photo->temporaryUrl() }}" alt="Staff photo" class="w-auto h-20">
                                    @elseif ($editStaff && $editStaff->photoUrl)
                                        <img src="{{ $editStaff->photoUrl }}" alt="Staff photo" class="w-auto h-20">
                                    @else
                                        <p class="text-xs text-gray-400">No pic</p>
                                    @endif
                                </div>
                            </div>

                            <div class="flex-1">
                                <x-input.group label="Photo" for="photo" required :error="$errors->first('photo')">
                                    <x-input.filepond wire:model="photo" id="photo" placeholder="Staff photo" />
                                </x-input.group>
                            </div>
                        </div>


                    </div>
                    <input type="submit" class="hidden">
                </form>
            </div>
            <div class="p-4 border-t">
                <div class="flex items-center space-x-2 md:justify-end">
                    <x-button.default class="px-4 py-2" wire:click="closeForm">{{ __('Cancel') }}</x-button.default>
                    <x-button.primary class="px-4 py-2" wire:click="save">{{ __('Save staff') }}</x-button.primary>
                </div>
            </div>
        </x-modal>
    </div>

    <!-- Confirm delete modal -->
    <div>
        <x-modal wire:model.defer="deleteConfirmation" max-width="md">
            <div class="flex items-center justify-between p-4">
                <x-section-title title="{{ __('Delete staff') }}"/>
                <div>
                    <x-button.danger wire:click="cancelDelete"><x-heroicon-o-x class="w-4 h-4"/></x-button.danger>
                </div>
            </div>
            <div class="p-4">
                {{ __('Are you sure you want to delete this staff? This action is irreversible!') }}
            </div>
            <div class="p-4 border-t">
                <div class="flex items-center space-x-2 md:justify-end">
                    <x-button.default wire:click="cancelDelete">{{ __('Cancel') }}</x-button.default>
                    <x-button.danger wire:click="delete">{{ __('Delete') }}</x-button.danger>
                </div>
            </div>
        </x-modal>
    </div>
</div>
