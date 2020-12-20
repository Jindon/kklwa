<div class="bg-gray-100">
    <div class="max-w-6xl mx-auto px-3 md:px-6 py-8 md:py-12">
        <div class="flex flex-col md:flex-row justify-between space-y-6 space-x-0 md:space-y-0 md:space-x-8">
            <div class="w-full md:w-2/6">
                <x-logo />
                <p class="leading-snug my-4"><span class="font-bold">KKLWA</span> (Kumbi Khullakpam Leikai Women's Association)</p>

                <p class="font-bold text-green-600 mb-3 uppercase text-xs tracking-widest">Address</p>
                <p class="">Kumbi Khullakpam Leikai, P.O. Moirang Bishnupur District Manipur - 795133</p>
            </div>
            <div class="w-full md:w-3/6">
                <div id="footerCalendar" class="vanilla-calendar"></div>
            </div>
            <div class="w-full md:w-1/6">
                <p class="font-bold text-green-600 mb-3 uppercase text-xs tracking-widest">Navigation</p>

                <nav class="space-y-2 flex flex-col">
                    <x-nav-link href="/">Home</x-nav-link>
                    <x-nav-link href="/">About</x-nav-link>
                    <x-nav-link href="/">Staffs</x-nav-link>
                    <x-nav-link href="/">Beneficiaries</x-nav-link>
                    <x-nav-link href="/">Gallery</x-nav-link>
                    <x-nav-link href="/">Contact</x-nav-link>
                </nav>
            </div>
        </div>
    </div>

    <div class="p-3 text-center bg-green-700">
        <p class="text-sm text-green-100 tracking-wide">Copyright {{now()->year}} © {{ config('app.name', 'KKLWA') }}</p>
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
