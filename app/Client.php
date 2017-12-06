<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'date',
        'dob',
        'apartment_name',
        'gender',
        'ethnicity',
        'birth_country',
        'veteran_status',
        'incarceration',
        'insurance_type',
    ];
    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }
}
