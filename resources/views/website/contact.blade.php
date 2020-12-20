<x-website-layout>

    {{-- Beneficiaries Section --}}
    <div class="bg-white">
        <div class="max-w-6xl mx-auto px-3 md:px-6 py-12 md:py-24 space-y-6 md:space-y-12">
            <div class="flex flex-col md:flex-row justify-between space-y-4 md:space-y-0 items-start md:items-center">
                <x-section-title
                    title="Contact"
                    description="Contact us using the details below"
                />
            </div>

            <div class="space-y-3">
                <div class="flex space-x-2">
                    <x-heroicon-o-map class="w-6 h-6 text-green-700"/>
                    <p class="font-bold text-gray-600">Kumbi Khullakpam Leikai, P.O. Moirang Bishnupur DIstrict Manipur – 795133</p>
                </div>
                <div class="flex space-x-2">
                    <x-heroicon-o-phone class="w-6 h-6 text-green-700"/>
                    <p class="font-bold text-gray-600">0385-274273</p>
                </div>
                <div class="flex space-x-2">
                    <x-heroicon-o-device-tablet class="w-6 h-6 text-green-700"/>
                    <p class="font-bold text-gray-600">9089217476</p>
                </div>
                <div class="flex space-x-2">
                    <x-heroicon-o-mail class="w-6 h-6 text-green-700"/>
                    <p class="font-bold text-gray-600">kklwa020@gmail.com</p>
                </div>
            </div>

            <div class="">
                <iframe
                    class="w-full h-96 rounded-lg shadow-lg"
                    src="https://maps.google.com/maps?q=kumbi&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                ></iframe>
            </div>

        </div>
    </div>

</x-website-layout>
