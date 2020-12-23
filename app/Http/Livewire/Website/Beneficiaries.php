<?php

namespace App\Http\Livewire\Website;

use App\Models\Beneficiary;
use Carbon\CarbonPeriod;
use Livewire\Component;
use Livewire\WithPagination;

class Beneficiaries extends Component
{
    use WithPagination;

    public $year;
    public $month;
    public $years;
    public $months;

    public function mount()
    {
        $this->years = range(config('app.filter_start_year'), date("Y"));

        $period = CarbonPeriod::create('2020-01-01', '1 month', '2020-12-01');
        $this->months = array_map(function($month) {
            return $month->format("M");
        }, $period->toArray());

        $this->year = now()->year;
        $this->month = now()->format('M');
    }

    public function updatedFilters(){ $this->resetPage(); }

    public function render()
    {
        return view('livewire.website.beneficiaries', [
            'beneficiaries' => Beneficiary::query()
                                ->orderBy('created_at', 'DESC')
                                ->when($this->month, fn($query, $month) => $query->whereMonth('doe', date("m", strtotime($month))))
                                ->when($this->year, fn($query, $year) => $query->whereYear('doe', $year))
                                ->paginate(10),
        ])->layout('layouts.website', ['metaTitle' => 'Beneficiaries']);
    }
}
