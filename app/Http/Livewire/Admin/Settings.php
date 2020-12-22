<?php

namespace App\Http\Livewire\Admin;

use App\Models\Settings as ModelsSettings;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{

    use WithFileUploads;

    public $perPage = 10;
    public $logo;
    public $logoUrl;
    public $sitename;
    public $photo = NULL;
    public $newPassword;
    public $currentPassword;

    protected $rules = [
        'sitename' => 'required|max:100',
        'photo' => 'nullable|image|max:1024',
    ];

    public function mount()
    {
        $this->sitename = ModelsSettings::where('key', 'sitename')->first()->value;
        $logo = ModelsSettings::where('key', 'logo')->first();
        $this->logo = $logo->value;
        $this->logoUrl = $logo->getImageUrl();
    }

    public function save()
    {
        $this->validate();

        $photoName = $this->photo
            ? $this->photo->store('/', 'uploads')
            : $this->logo;

        if($this->photo) {
            ModelsSettings::where('key', 'logo')->first()->update(['value' => $photoName]);
        }
        ModelsSettings::where('key', 'sitename')->first()->update(['value' => $this->sitename]);

        $this->dispatchBrowserEvent('pondReset');

        $this->notify([
            'message' => 'Settings saved successfully!',
            'status' => 'success'
        ]);
    }

    public function savePassword()
    {
        if($this->newPassword) {

            $this->validate([
                'newPassword' => 'required|min:8',
                'currentPassword' => 'required',
            ]);

            if(Hash::check($this->currentPassword, auth()->user()->getAuthPassword())) {
                auth()->user()->update([
                    'password' => Hash::make($this->newPassword)
                ]);
                $this->reset(['newPassword', 'currentPassword']);
                $this->notify([
                    'message' => 'Password updated successfully!',
                    'status' => 'success'
                ]);
            } else {
                $this->addError('currentPassword', 'Wrong password entered!');
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.settings');
    }
}
