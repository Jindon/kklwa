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
        return $this->is_image ? Storage::disk('uploads')->url($this->value) : NULL;
    }
}
