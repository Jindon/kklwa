<div id="staffs" class="bg-white">
    <div class="max-w-6xl px-3 py-12 mx-auto space-y-6 md:px-6 md:py-24 md:space-y-12">
        <div class="flex flex-col items-start justify-between space-y-4 md:flex-row md:space-y-0 md:items-center">
            <x-section-title
                title="Beneficiaries"
                description="Our beneficiaries for {{ $month }}, {{ $year }}"
            />

            <div class="flex items-center space-x-3">
                <div class="w-32">
                    <x-input.group>
                        <x-input.select wire:model="month" id="month">
                            @foreach($months as $m)
                                <option value="{{ $m }}">{{ $m }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                </div>
                <div class="w-32">
                    <x-input.group>
                        <x-input.select wire:model="year" id="year">
                        @foreach($years as $y)
                            <option value="{{ $y }}">{{ $y }}</option>
                        @endforeach
                        </x-input.select>
                    </x-input.group>
                </div>
            </div>
        </div>

        <div class="overflow-hidden overflow-x-auto">
            <x-table>
                <x-slot name="head">
                    <x-table.heading>Name</x-table.heading>
                    <x-table.heading>S/o, W/o, D/o</x-table.heading>
                    <x-table.heading>D.O.B</x-table.heading>
                    <x-table.heading>Gender</x-table.heading>
                    <x-table.heading>Category</x-table.heading>
                    <x-table.heading>Address</x-table.heading>
                    <x-table.heading>Education</x-table.heading>
                    <x-table.heading>D.O.E</x-table.heading>
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
    </div>
</div>
