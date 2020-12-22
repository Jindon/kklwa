<?php

namespace App\Http\Livewire\Admin;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageGallery extends Component
{

    use WithPagination, WithFileUploads;

    public $perPage = 12;
    public $search = '';
    public $gallery;
    public $photo = NULL;
    public $showForm = false;
    public $editGallery = NULL;
    public $deleteGallery = NULL;
    public $deleteConfirmation = false;

    protected function rules() { return [
        'gallery.photo' => 'nullable',
        'gallery.name' => 'nullable|string|max:100',
        'gallery.caption' => 'nullable|max:500',
        'photo' => 'nullable|image|max:2048',
    ];}

    public function openForm(Gallery $gallery = NULL)
    {
        $this->gallery = $gallery
                ? $gallery
                : new Gallery();

        $this->editGallery = $gallery;
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
                        ? $this->photo->store('/', 'gallery')
                        : $this->gallery->photo;

        $this->gallery->photo = $photoName;
        $this->gallery->name = $this->photo->getClientOriginalName();

        $this->gallery->save();

        $this->showForm = false;

        $this->reset();
        $this->dispatchBrowserEvent('pondReset');

        $this->notify([
            'message' => 'Photo saved successfully!',
            'status' => 'success'
        ]);
    }

    public function confirmDelete(Gallery $gallery)
    {
        $this->deleteGallery = $gallery;
        $this->deleteConfirmation = true;
    }

    public function cancelDelete()
    {
        $this->deleteGallery = NULL;
        $this->deleteConfirmation = false;
    }

    public function delete()
    {
        // $this->authorize('settings');
        $this->deleteGallery->delete();
        $this->deleteGallery = NULL;
        $this->deleteConfirmation = false;
        $this->notify([
            'message' => 'Photo deleted successfully!',
            'status' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.manage-gallery', [
            'galleryPhotos' => Gallery::query()
                            ->orderBy('created_at', 'DESC')
                            ->paginate($this->perPage),
        ]);
    }
}
