<div>
    <div>
        <div class="mb-4">
            <p class="text-xl font-bold text-green-700">Update contact details</p>
        </div>

        <form wire:submit.prevent="save" wire:loading.class.delay="opacity-50">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <x-input.group label="Address" for="address" :error="$errors->first('address')">
                        <x-input.text id="address" placeholder="Enter new password" wire:model="address"></x-input>
                    </x-input.group>
                </div>
                <div>
                    <x-input.group label="Telephone" for="telephone" :error="$errors->first('telephone')">
                        <x-input.text id="telephone" placeholder="Enter new password" wire:model="telephone"></x-input>
                    </x-input.group>
                </div>
                <div>
                    <x-input.group label="Phone" for="phone" :error="$errors->first('phone')">
                        <x-input.text id="phone" placeholder="Enter new password" wire:model="phone"></x-input>
                    </x-input.group>
                </div>
                <div>
                    <x-input.group label="Email" for="email" :error="$errors->first('email')">
                        <x-input.text id="email" placeholder="Enter new password" wire:model="email"></x-input>
                    </x-input.group>
                </div>
            </div>
            <input type="submit" class="hidden">
        </form>
    </div>

    <div class="flex items-center mt-6 space-x-2 md:justify-end">
        <x-button.primary class="px-4 py-2" wire:click="save">{{ __('Save contact details') }}</x-button.primary>
    </div>
</div>
