<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Settings extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImageUrl()
    {
        if($this->is_image && Storage::disk('uploads')->exists($this->value)) {
            return Storage::disk('uploads')->url($this->value);
        }
        return $this->key == 'logo' ? asset('images/logo.png') : NULL;
    }
}
