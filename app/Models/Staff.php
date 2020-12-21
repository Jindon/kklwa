<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class Staff extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends  = ['photoUrl'];

    public function getPhotoUrlAttribute()
    {
        return $this->photo ? Storage::disk('staffPhotos')->url($this->photo) : NULL;
    }

    public function DoaDate()
    {
        return $this->humanDate($this->doa);
    }

    protected function humanDate($date)
    {
        if($date) {
            return Carbon::make($date)->toFormattedDateString();
        }

        return 'N/A';
    }
}
