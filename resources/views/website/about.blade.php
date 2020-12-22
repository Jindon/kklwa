<x-website-layout>

    <div class="bg-white">
        <div class="max-w-6xl px-3 py-12 mx-auto md:px-6 md:py-24">
            <div class="flex flex-col items-start justify-between mb-8 space-y-4 md:flex-row md:space-y-0 md:items-center">
                <x-section-title
                    title="About"
                    description="About us"
                />
            </div>
            <div class="flex flex-col space-y-6 md:flex-row md:justify-between md:items-start md:space-y-0">
                <div class="w-full md:w-6/12">
                    <div>
                        {!! $about->content !!}
                    </div>
                </div>
                <div class="flex justify-end w-full md:w-6/12">
                    <img src="{{ $about->imageUrl }}" alt="" class="rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </div>

</x-website-layout>
