<div>
    <div class="flex flex-col items-start mb-6 md:flex-row md:justify-between md:items-center">
        <div class="md:w-full">
            <x-section-title
                title="Settings"
                description="Manage site settings"
            />
        </div>
    </div>

    <div class="">
        <div class="py-6 border-t">
            <form wire:submit.prevent="save">
                <div class="grid gap-4 grids-cols-1 md:grids-cols-2">
                    <div class="md:col-span-2">
                        <x-input.group label="Sitename" for="sitename" required :error="$errors->first('sitename')">
                            <x-input.text wire:model="sitename" id="sitename" placeholder="Enter site name" required></x-input.text>
                        </x-input.group>
                    </div>

                    <div class="flex flex-col space-y-4 md:col-span-2">
                        <div class="w-full">
                            <x-input.group label="Logo" for="photo" required :error="$errors->first('logo')">
                                <div class="flex flex-col md:flex-row">
                                    <div class="flex items-center justify-start w-full h-20 mb-2 overflow-hidden md:w-64">
                                        @if ($photo)
                                            <img src="{{ $photo->temporaryUrl() }}" alt="Staff photo" class="w-auto h-20 rounded">
                                        @else
                                            <img src="{{ $logoUrl }}" alt="Staff photo" class="w-auto h-20 rounded">
                                        @endif
                                    </div>
                                    <div class="w-full">
                                        <x-input.filepond wire:model="photo" id="photo" placeholder="Staff photo" />
                                    </div>
                                </div>
                            </x-input.group>
                        </div>
                    </div>
                </div>
                <input type="submit" class="hidden">
            </form>
        </div>

        <div class="flex items-center space-x-2 md:justify-end">
            <x-button.primary class="px-4 py-2" wire:click="save">{{ __('Save settings') }}</x-button.primary>
        </div>
    </div>

    <div class="mt-6">
        <div class="py-6 border-t">
            <div class="mb-4">
                <p class="text-xl font-bold text-green-700">Update admin password</p>
            </div>

            <form wire:submit.prevent="save">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <x-input.group label="New password" for="newPassword" :error="$errors->first('newPassword')">
                            <x-input.password id="newPassword" placeholder="Enter new password" wire:model="newPassword"></x-input>
                        </x-input.group>
                    </div>

                    <div>
                        <x-input.group label="Current password" for="currentPassword" :error="$errors->first('currentPassword')">
                            <x-input.password id="currentPassword" placeholder="Enter current password" wire:model="currentPassword"></x-input>
                        </x-input.group>
                    </div>
                </div>
                <input type="submit" class="hidden">
            </form>
        </div>

        <div class="flex items-center space-x-2 md:justify-end">
            <x-button.primary class="px-4 py-2" wire:click="savePassword">{{ __('Update password') }}</x-button.primary>
        </div>
    </div>

    <div class="py-6 mt-6 border-t">
        <livewire:admin.manage-contact />
    </div>
</div>
