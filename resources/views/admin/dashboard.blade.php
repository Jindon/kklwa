<x-app-layout>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
        <div class="p-3 border border-gray-300 rounded">
            <p class="mb-2 text-xs font-bold tracking-widest uppercase">Staffs</p>
            <p class="text-gray-600">Total number of staffs</p>
            <p class="text-4xl font-bold text-green-600">{{ $staffs_count }}</p>
        </div>
        <div class="p-3 border border-gray-300 rounded">
            <p class="mb-2 text-xs font-bold tracking-widest uppercase">Beneficiaries</p>
            <p class="text-gray-600">Total number of beneficiaries</p>
            <p class="text-4xl font-bold text-green-600">{{ $beneficiaries_count }}</p>
        </div>
    </div>
</x-app-layout>
