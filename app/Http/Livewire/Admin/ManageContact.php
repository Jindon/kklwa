<?php

namespace App\Http\Livewire\Admin;

use App\Models\Settings;
use Livewire\Component;

class ManageContact extends Component
{
    public $address;
    public $telephone;
    public $phone;
    public $email;

    protected $rules = [
        'address' => 'required|string|max:100',
        'telephone' => 'required|string|max:100',
        'phone' => 'required|string|max:100',
        'email' => 'required|email|max:100',
    ];

    public function mount()
    {
        $this->address = Settings::where('key', 'contact-address')->first()->value;
        $this->telephone = Settings::where('key', 'contact-telephone')->first()->value;
        $this->phone = Settings::where('key', 'contact-phone')->first()->value;
        $this->email = Settings::where('key', 'contact-email')->first()->value;
    }

    public function save()
    {
        $this->validate();

        Settings::where('key', 'contact-address')->first()->update(['value' => $this->address]);
        Settings::where('key', 'contact-telephone')->first()->update(['value' => $this->telephone]);
        Settings::where('key', 'contact-phone')->first()->update(['value' => $this->phone]);
        Settings::where('key', 'contact-email')->first()->update(['value' => $this->email]);

        $this->notify([
            'message' => 'Contact settings saved successfully!',
            'status' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.manage-contact');
    }
}
