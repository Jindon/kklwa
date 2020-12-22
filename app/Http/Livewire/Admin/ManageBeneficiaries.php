<?php

namespace App\Http\Livewire\Admin;

use App\Models\Beneficiary;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ManageBeneficiaries extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $beneficiary;
    public $deleteBeneficiary = NULL;
    public $showForm = false;
    public $deleteConfirmation = false;
    public $home = 'Home';

    protected $rules = [
        'beneficiary.name' => 'required|string|max:100',
        'beneficiary.relation' => 'nullable',
        'beneficiary.relation_name' => 'required|string|max:500',
        'beneficiary.dob' => 'required',
        'beneficiary.gender' => 'required',
        'beneficiary.category' => 'required',
        'beneficiary.address' => 'nullable|string|max:500',
        'beneficiary.edu_qualification' => 'nullable|string|max:100',
        'beneficiary.doe' => 'required',
    ];

    public function openForm(Beneficiary $beneficiary = NULL)
    {
        $this->beneficiary = $beneficiary
                ? $beneficiary
                : new Beneficiary();

        $this->beneficiary->dob = Carbon::parse($this->beneficiary->dob)->format('d/m/Y');
        $this->beneficiary->doe = Carbon::parse($this->beneficiary->doe)->format('d/m/Y');

        $this->showForm = true;
    }

    public function closeForm(){ $this->showForm = false; }

    public function save()
    {
        $this->validate();

        $this->beneficiary->dob = Carbon::createFromFormat('d/m/Y', $this->beneficiary->dob);
        $this->beneficiary->doe = Carbon::createFromFormat('d/m/Y', $this->beneficiary->doe);

        $this->beneficiary->save();

        $this->showForm = false;

        $this->notify([
            'message' => 'Beneficiary saved successfully!',
            'status' => 'success'
        ]);
    }

    public function confirmDelete(Beneficiary $beneficiary)
    {
        $this->deleteBeneficiary = $beneficiary;
        $this->deleteConfirmation = true;
    }

    public function cancelDelete()
    {
        $this->deleteBeneficiary = NULL;
        $this->deleteConfirmation = false;
    }

    public function delete()
    {
        // $this->authorize('settings');
        $this->deleteBeneficiary->delete();
        $this->deleteBeneficiary = NULL;
        $this->deleteConfirmation = false;
        $this->notify([
            'message' => 'Beneficiary deleted successfully!',
            'status' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.manage-beneficiaries', [
            'beneficiaries' => Beneficiary::query()
                                ->when($this->search, fn($query, $search) => $query->where('name', 'like', '%'.$search.'%'))
                                ->orderBy('created_at', 'DESC')
                                ->paginate($this->perPage)
        ]);
    }
}
