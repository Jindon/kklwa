<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends  = ['photoUrl'];

    public function getPhotoUrlAttribute()
    {
        return $this->photo ? Storage::disk('gallery')->url($this->photo) : NULL;
    }
}
