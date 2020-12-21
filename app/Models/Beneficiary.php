<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Beneficiary extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setRelationAttribute($value)
    {
        $this->attributes['relation'] = $value ?? 1;
    }

    public function DobDate()
    {
        return $this->humanDate($this->dob);
    }
    public function DoeDate()
    {
        return $this->humanDate($this->doe);
    }

    protected function humanDate($date)
    {
        if($date) {
            return Carbon::make($date)->toFormattedDateString();
        }

        return 'N/A';
    }
}
