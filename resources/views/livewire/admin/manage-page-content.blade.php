<div>
    <div class="flex flex-col items-start mb-6 md:flex-row md:justify-between md:items-center">
        <div class="md:w-3/5">
            <x-section-title
                title="Page contents"
                description="Manage page contents"
            />
        </div>
    </div>

    {{-- Slider --}}
    <div class="py-4 pb-4 border-t-2 border-b-2 border-gray-300">
        <livewire:admin.manage-slider />
    </div>

    {{-- Manage contents section --}}
    <div class="py-4 space-y-6 border-t border-gray-300" wire:loading.class.delay="opacity-50">
        <x-modal-title title="About section" />

        <form wire:submit.prevent="save">

            <div class="flex flex-col justify-between space-y-4 md:flex-row md:space-x-4 md:space-y-0">
                <div class="md:w-2/3">
                    <x-input.group label="Content" required for="about-content" :error="$errors->first('aboutContent')">
                        <x-input.richtext
                            wire:model.lazy="aboutContent"
                            id="about-content"
                            required
                            :initial-value="$about->content"
                        ></x-input.richtext>
                    </x-input.group>
                </div>

                <div class="md:w-1/3">
                    <div>
                        <x-input.group label="Photo" for="photo" :error="$errors->first('photo')">
                            <x-input.filepond wire:model="photo" id="photo" max-flie="2MB" />
                        </x-input.group>
                    </div>

                    <div>
                        <div class="flex items-center justify-center w-full h-64 overflow-hidden bg-gray-100 rounded-lg md:mt-6">
                            @if ($photo)
                                <img src="{{ $photo->temporaryUrl() }}" alt="Gallery photo" class="w-auto h-64">
                            @elseif ($about->imageUrl)
                                <img src="{{ $about->imageUrl }}" alt="Gallery photo" class="w-auto h-64">
                            @else
                                <p class="text-xs text-gray-400">No image to preview</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <input type="submit" class="hidden">
        </form>

        <div class="py-4 border-t border-gray-300">
            <x-button.primary class="px-4 py-2" wire:click="saveAbout">{{ __('Save about section') }}</x-button.primary>
        </div>
    </div>

</div>
