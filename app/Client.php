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

    public $dates = [
        'date',
        'dob'
    ];

    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }

    public function family()
    {
        return $this->hasMany(Family::class);
    }

    public function income()
    {
        return $this->hasOne(Income::class);
    }

    public function getNameAttribute()
    {
        if(!$this->contact) {
            return "no name";
        }
        return "{$this->contact->first_name} {$this->contact->last_name}";
    }

    public function delete()
    {
        $this->contact()->delete();
        $this->family()->delete();
        $this->income()->delete();
        parent::delete();
    }
}
