<?php

namespace App\Http\Livewire\Admin;

use App\Models\PageContent;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManagePageContent extends Component
{
    use WithFileUploads;

    public $perPage = 10;
    public $about;
    public $photo = NULL;
    public $aboutContent = '';

    protected $rules = [
        'about.content' => 'required|max:9000',
        'about.image' => 'nullable',
        'aboutContent' => 'required|max:9000',
        'photo' => 'nullable|image|max:2048',
    ];

    public function mount()
    {
        $this->about = PageContent::whereSection('about')->first();

        $this->aboutContent = $this->about->content;
    }

    public function saveAbout()
    {
        $this->validate();

        $photoName = $this->photo
            ? $this->photo->store('/', 'uploads')
            : $this->about->image;

        $this->about->image = $photoName;
        $this->about->content = $this->aboutContent;

        $this->about->save();

        $this->dispatchBrowserEvent('pondReset');

        $this->notify([
            'message' => 'About section saved successfully!',
            'status' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.manage-page-content');
    }
}
