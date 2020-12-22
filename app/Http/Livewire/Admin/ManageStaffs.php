<?php

namespace App\Http\Livewire\Admin;

use App\Models\Staff;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageStaffs extends Component
{

    use WithPagination, WithFileUploads;

    public $perPage = 10;
    public $search = '';
    public $staff;
    public $photo = NULL;
    public $showForm = false;
    public $editStaff = NULL;
    public $deleteStaff = NULL;
    public $deleteConfirmation = false;

    protected function rules() { return [
        'staff.photo' => 'nullable',
        'staff.name' => 'required|string|max:100',
        'staff.edu_qualification' => 'nullable|string|max:100',
        'staff.designation' => 'required|string|max:500',
        'staff.address' => 'nullable|string|max:500',
        'staff.doa' => 'required',
        'photo' => 'nullable|image|max:2048',
    ];}

    public function openForm(Staff $staff = NULL)
    {
        $this->staff = $staff
                ? $staff
                : new Staff();

        $this->staff->doa = Carbon::parse($this->staff->doa)->format('d/m/Y');
        $this->editStaff = $staff;
        $this->showForm = true;
    }

    public function closeForm()
    {
        $this->showForm = false;
        $this->reset();
        $this->dispatchBrowserEvent('pondReset');
    }

    public function save()
    {
        $this->validate();

        $photoName = $this->photo
                        ? $this->photo->store('/', 'staffPhotos')
                        : $this->staff->photo;

        $this->staff->photo = $photoName;

        $this->staff->doa = Carbon::createFromFormat('d/m/Y', $this->staff->doa);

        $this->staff->save();

        $this->showForm = false;

        $this->reset();
        $this->dispatchBrowserEvent('pondReset');

        $this->notify([
            'message' => 'Staff saved successfully!',
            'status' => 'success'
        ]);
    }

    public function confirmDelete(Staff $staff)
    {
        $this->deleteStaff = $staff;
        $this->deleteConfirmation = true;
    }

    public function cancelDelete()
    {
        $this->deleteStaff = NULL;
        $this->deleteConfirmation = false;
    }

    public function delete()
    {
        // $this->authorize('settings');
        $this->deleteStaff->delete();
        $this->deleteStaff = NULL;
        $this->deleteConfirmation = false;
        $this->notify([
            'message' => 'Staff deleted successfully!',
            'status' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.manage-staffs', [
            'staffs' => Staff::query()
                        ->when($this->search, fn($query, $search) => $query->where('name', 'like', '%'.$search.'%'))
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->perPage)
        ]);
    }
}
