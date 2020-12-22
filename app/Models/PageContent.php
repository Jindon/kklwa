<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PageContent extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['imageUrl'];

    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::disk('uploads')->url($this->image) : NULL;
    }
}
