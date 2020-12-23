<div>
    <div class="flex flex-col items-start mb-6 md:flex-row md:justify-between md:items-center">
        <div class="md:w-3/5">
            <x-section-title
                title="Beneficiaries"
                description="Manage beneficiaries"
            />
        </div>

        <div class="flex w-full space-x-3">
            <div class="flex-1">
                <x-input.text type="text" wire:model="search" placeholder="Search beneficiaries.."/>
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
                <x-table.heading>Name</x-table.heading>
                <x-table.heading>S/o, W/o, D/o</x-table.heading>
                <x-table.heading>DOB</x-table.heading>
                <x-table.heading>Gender</x-table.heading>
                <x-table.heading>Category</x-table.heading>
                <x-table.heading>Address</x-table.heading>
                <x-table.heading>Edn. Qlfn.</x-table.heading>
                <x-table.heading>DOE</x-table.heading>
                <x-table.heading>Actions</x-table.heading>
            </x-slot>
            <x-slot name="body">
                @forelse($beneficiaries as $index=>$beneficiary)
                    <x-table.row class="{{ $index % 2 !== 0 ? 'bg-white' : '' }}" wire:loading.class.delay="opacity-50" wire:key='beneficiary-{{ $beneficiary->id }}'>
                        <x-table.cell class="font-bold">{{ $beneficiary->name }}</x-table.cell>
                        <x-table.cell>{{ $beneficiary->relation_name }}</x-table.cell>
                        <x-table.cell>{{ $beneficiary->DobDate() }}</x-table.cell>
                        <x-table.cell>{{ App\Models\Beneficiary::GENDER[$beneficiary->gender] }}</x-table.cell>
                        <x-table.cell>{{ App\Models\Beneficiary::CATEGORY[$beneficiary->category] }}</x-table.cell>
                        <x-table.cell>{{ $beneficiary->address }}</x-table.cell>
                        <x-table.cell>{{ $beneficiary->edu_qualification }}</x-table.cell>
                        <x-table.cell>{{ $beneficiary->DoeDate() }}</x-table.cell>
                        <x-table.cell>
                            <div class="flex items-center space-x-2">
                                <x-button.primary wire:click="openForm({{ $beneficiary }})">
                                    <x-heroicon-o-pencil class="w-4 h-4"/>
                                </x-button.primary>
                                <x-button.danger wire:click="confirmDelete({{ $beneficiary }})">
                                    <x-heroicon-o-trash class="w-4 h-4"/>
                                </x-button.danger>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="9">
                            <div class="flex justify-center w-full py-10 text-gray-500">
                                No beneifiaries found..
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-table>

        <div class="mt-4">
            {{ $beneficiaries->links() }}
        </div>
    </div>

    <!-- Beneficiaries form modal -->
    <x-modal wire:model="showForm" max-width="lg">
        <div class="flex items-start justify-between p-4 md:p-6">
            <x-modal-title
                title="{{ __('Save beneficiary') }}"
                description="{{ __('Add / edit beneficiary') }}"
            />
            <div>
                <x-button.danger wire:click="closeForm"><x-heroicon-o-x class="w-4 h-4"/></x-button.danger>
            </div>
        </div>
        <div class="p-4 border-t md:p-6">
            <form wire:submit.prevent="save">
                <div class="grid gap-4 grids-cols-1 md:grids-cols-2">
                    <div class="md:col-span-2">
                        <x-input.group required :error="$errors->first('beneficiary.name')">
                            <x-input.text wire:model="beneficiary.name" id="name" placeholder="Enter beneficiary name" required></x-input.text>
                        </x-input.group>
                    </div>

                    <div class="md:col-span-2">
                        <div class="flex space-x-3">
                            <div class="w-32">
                                <x-input.group required :error="$errors->first('beneficiary.relation')">
                                    <x-input.select wire:model="beneficiary.relation">
                                        <option value="1" selected>Son of</option>
                                        <option value="2">Wife of</option>
                                        <option value="3">Daughter of</option>
                                    </x-input.select>
                                </x-input.group>
                            </div>
                            <div class="flex-1">
                                <x-input.group required :error="$errors->first('beneficiary.relation_name')">
                                    <x-input.text wire:model="beneficiary.relation_name" id="relation_name" placeholder="Enter name" required></x-input.text>
                                </x-input.group>
                            </div>
                        </div>
                    </div>

                    <div>
                        <x-input.group required :error="$errors->first('beneficiary.dob')">
                            <x-input.date wire:model="beneficiary.dob" id="dob" placeholder="Date of birth"/>
                        </x-input.group>
                    </div>

                    <div>
                        <x-input.group required :error="$errors->first('beneficiary.gender')">
                            <x-input.select wire:model="beneficiary.gender">
                                <option value="0">Select gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Other</option>
                            </x-input.select>
                        </x-input.group>
                    </div>

                    <div>
                        <x-input.group required :error="$errors->first('beneficiary.category')">
                            <x-input.select wire:model="beneficiary.category">
                                <option value="0">Select category</option>
                                <option value="1">General</option>
                                <option value="2">OBC</option>
                                <option value="3">SC</option>
                                <option value="4">ST</option>
                            </x-input.select>
                        </x-input.group>
                    </div>

                    <div>
                        <x-input.group required :error="$errors->first('beneficiary.edu_qualification')">
                            <x-input.text wire:model="beneficiary.edu_qualification" placeholder="Eucational qualification" required></x-input.text>
                        </x-input.group>
                    </div>

                    <div class="md:col-span-2">
                        <x-input.group required :error="$errors->first('beneficiary.address')">
                            <x-input.textarea wire:model="beneficiary.address" placeholder="Enter address" required></x-input.textarea>
                        </x-input.group>
                    </div>

                    <div>
                        <x-input.group required :error="$errors->first('beneficiary.doe')">
                            <x-input.date wire:model="beneficiary.doe" id="doe" placeholder="Date of entry"/>
                        </x-input.group>
                    </div>
                </div>
                <input type="submit" class="hidden">
            </form>
        </div>
        <div class="p-4 border-t">
            <div class="flex items-center space-x-2 md:justify-end">
                <x-button.default class="px-4 py-2" wire:click="closeForm">{{ __('Cancel') }}</x-button.default>
                <x-button.primary class="px-4 py-2" wire:click="save">{{ __('Save beneficiary') }}</x-button.primary>
            </div>
        </div>
    </x-modal>

    <!-- Confirm delete modal -->
    <x-modal wire:model.defer="deleteConfirmation" max-width="md">
        <div class="flex items-center justify-between p-4">
            <x-modal-title title="{{ __('Delete beneficiary') }}"/>
            <div>
                <x-button.danger wire:click="cancelDelete"><x-heroicon-o-x class="w-4 h-4"/></x-button.danger>
            </div>
        </div>
        <div class="p-4">
            {{ __('Are you sure you want to delete this beneficiary? This action is irreversible!') }}
        </div>
        <div class="p-4 border-t">
            <div class="flex items-center space-x-2 md:justify-end">
                <x-button.default wire:click="cancelDelete">{{ __('Cancel') }}</x-button.default>
                <x-button.danger wire:click="delete">{{ __('Delete') }}</x-button.danger>
            </div>
        </div>
    </x-modal>
</div>
