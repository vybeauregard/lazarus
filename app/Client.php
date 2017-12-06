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
        'homeless',
        'shelter',
        'private_res',
        'section_8',
        'arha',
        'other',
    ];
    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }
}
