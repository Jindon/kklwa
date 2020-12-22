<div>
    <div class="flex flex-col items-start mb-6 md:flex-row md:justify-between md:items-center">
        <div class="md:w-3/5">
            <x-section-title
                title="Gallery"
                description="Manage gallery photos"
            />
        </div>

        <div class="flex justify-end w-full space-x-3">
            {{-- <div class="flex-1">
                <x-input.text type="text" wire:model="search" placeholder="Search photos.."/>
            </div> --}}
            <div class="">
                <x-button.primary wire:click="openForm">
                    <x-heroicon-o-plus class="w-6 h-6"/>
                </x-button.primary>
            </div>
        </div>
    </div>

    <div class="">
        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4" wire:loading.class.delay="opacity-50">
            @forelse($galleryPhotos as $index=>$galleryPhoto)
                <div
                    wire:key='beneficiary-{{ $galleryPhoto->id }}'
                    class="relative w-full h-56 bg-gray-100 border border-gray-200 rounded"
                    style="background: url('{{ $galleryPhoto->photoUrl }}'); background-repeat: no-repeat; background-position: center; background-size: cover;"
                >

                    <div class="absolute top-0 right-0 flex items-center p-1 mt-1 mr-1 space-x-2 bg-black rounded bg-opacity-60">
                        <x-button.primary wire:click="openForm({{ $galleryPhoto }})">
                            <x-heroicon-o-pencil class="w-4 h-4"/>
                        </x-button.primary>
                        <x-button.danger wire:click="confirmDelete({{ $galleryPhoto }})">
                            <x-heroicon-o-trash class="w-4 h-4"/>
                        </x-button.danger>
                    </div>

                </div>
            @empty
                <div class="md:col-span-4 sm:col-span-3">
                    <div class="flex justify-center w-full py-24 text-gray-500 bg-gray-100 border border-green-100 rounded">
                        No photos found..
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $galleryPhotos->links() }}
        </div>
    </div>

    <!-- Gallery form modal -->
    <div>
        <x-modal wire:model="showForm" max-width="xl">
            <div class="flex items-start justify-between p-4 md:p-6">
                <x-modal-title
                    title="{{ __('Manage gallery') }}"
                    description="{{ __('Add / replace photo') }}"
                />
                <div>
                    <x-button.danger wire:click="closeForm"><x-heroicon-o-x class="w-4 h-4"/></x-button.danger>
                </div>
            </div>
            <div class="p-4 border-t md:p-6">
                <form wire:submit.prevent="save">
                    <div class="grid gap-3 grids-cols-1">
                        <div>
                            <div class="flex items-center justify-center w-full h-64 overflow-hidden bg-gray-100 rounded-lg md:mt-6">
                                @if ($photo)
                                    <img src="{{ $photo->temporaryUrl() }}" alt="Gallery photo" class="w-auto h-64">
                                @elseif ($editGallery && $editGallery->photoUrl)
                                    <img src="{{ $editGallery->photoUrl }}" alt="Gallery photo" class="w-auto h-64">
                                @else
                                    <p class="text-xs text-gray-400">No pic to preview</p>
                                @endif
                            </div>
                        </div>

                        <div>
                            <x-input.group label="Photo" for="photo" required :error="$errors->first('photo')">
                                <x-input.filepond wire:model="photo" id="photo" max-flie="2MB" />
                            </x-input.group>
                        </div>


                    </div>
                    <input type="submit" class="hidden">
                </form>
            </div>
            <div class="p-4 border-t">
                <div class="flex items-center space-x-2 md:justify-end">
                    <x-button.default class="px-4 py-2" wire:click="closeForm">{{ __('Cancel') }}</x-button.default>
                    <x-button.primary class="px-4 py-2" wire:click="save">{{ __('Save photo') }}</x-button.primary>
                </div>
            </div>
        </x-modal>
    </div>

    <!-- Confirm delete modal -->
    <div>
        <x-modal wire:model.defer="deleteConfirmation" max-width="md">
            <div class="flex items-center justify-between p-4">
                <x-modal-title title="{{ __('Delete photo') }}"/>
                <div>
                    <x-button.danger wire:click="cancelDelete"><x-heroicon-o-x class="w-4 h-4"/></x-button.danger>
                </div>
            </div>
            <div class="p-4">
                {{ __('Are you sure you want to delete this photo? This action is irreversible!') }}
            </div>
            <div class="p-4 border-t">
                <div class="flex items-center space-x-2 md:justify-end">
                    <x-button.default wire:click="cancelDelete">{{ __('Cancel') }}</x-button.default>
                    <x-button.danger wire:click="delete">{{ __('Delete photo') }}</x-button.danger>
                </div>
            </div>
        </x-modal>
    </div>
</div>
