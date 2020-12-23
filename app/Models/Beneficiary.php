<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Beneficiary extends Model
{
    use HasFactory;

    const CATEGORY = [
        1 => 'General',
        2 => 'OBC',
        3 => 'SC',
        4 => 'ST',
    ];

    const GENDER = [
        1 => 'Male',
        2 => 'Female',
        3 => 'Other',
    ];

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
