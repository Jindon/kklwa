<?php

namespace App\Http\Livewire\Admin;

use App\Models\PageContent;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageSlider extends Component
{
    use WithPagination, WithFileUploads;

    public $perPage = 12;
    public $search = '';
    public $slider;
    public $photo = NULL;
    public $showForm = false;
    public $editSlider = NULL;
    public $deleteSlider = NULL;
    public $deleteConfirmation = false;

    protected function rules() { return [
        'photo' => 'nullable|image|max:2048',
    ];}

    public function openForm(PageContent $slider = NULL)
    {
        $this->slider = $slider
                ? $slider
                : new PageContent();

        $this->editSlider = $slider;
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
                        ? $this->photo->store('/', 'uploads')
                        : $this->slider->image;

        $this->slider->section = 'slider';
        $this->slider->image = $photoName;

        $this->slider->save();

        $this->showForm = false;

        $this->reset();
        $this->dispatchBrowserEvent('pondReset');

        $this->notify([
            'message' => 'Photo saved successfully!',
            'status' => 'success'
        ]);
    }

    public function confirmDelete(PageContent $slider)
    {
        $this->deleteSlider = $slider;
        $this->deleteConfirmation = true;
    }

    public function cancelDelete()
    {
        $this->deleteSlider = NULL;
        $this->deleteConfirmation = false;
    }

    public function delete()
    {
        // $this->authorize('settings');
        $this->deleteSlider->delete();
        $this->deleteSlider = NULL;
        $this->deleteConfirmation = false;
        $this->notify([
            'message' => 'Photo deleted successfully!',
            'status' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.manage-slider', [
            'sliderImages' => PageContent::whereSection('slider')
                                ->paginate($this->perPage),
        ]);
    }
}
