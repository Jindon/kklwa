<div class="bg-gray-100">
    <div class="max-w-6xl px-3 py-8 mx-auto md:px-6 md:py-12">
        <div class="flex flex-col justify-between space-x-0 space-y-6 md:flex-row md:space-y-0 md:space-x-8">
            <div class="w-full md:w-2/6">
                <x-logo />
                <p class="my-4 leading-snug"><span class="font-bold">KKLWA</span> (Kumbi Khullakpam Leikai Women's Association)</p>

                <p class="mb-3 text-xs font-bold tracking-widest text-green-600 uppercase">Address</p>
                <p class="">Kumbi Khullakpam Leikai, P.O. Moirang Bishnupur District Manipur - 795133</p>
            </div>
            <div class="w-full md:w-3/6">
                <div id="footerCalendar" class="vanilla-calendar"></div>
            </div>
            <div class="w-full md:w-1/6">
                <p class="mb-3 text-xs font-bold tracking-widest text-green-600 uppercase">Navigation</p>

                <nav class="flex flex-col space-y-2">
                    <x-nav-link href="{{ route('website.home') }}">Home</x-nav-link>
                    <x-nav-link href="{{ route('website.about') }}">About</x-nav-link>
                    <x-nav-link href="{{ route('website.staffs') }}">Staffs</x-nav-link>
                    <x-nav-link href="{{ route('website.beneficiaries') }}">Beneficiaries</x-nav-link>
                    <x-nav-link href="{{ route('website.gallery') }}">Gallery</x-nav-link>
                    <x-nav-link href="{{ route('website.contact') }}">Contact</x-nav-link>
                </nav>
            </div>
        </div>
    </div>

    <div class="p-3 text-center bg-green-700">
        <p class="text-sm tracking-wide text-green-100">Copyright {{now()->year}} © {{ config('app.name', 'KKLWA') }}</p>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/vanilla-calendar-min.js') }}"></script>
    <script>
        let calendar = new VanillaCalendar({
            selector: "#footerCalendar"
        })

        calendar.onSelect = ()=>{return null}
    </script>
@endpush
