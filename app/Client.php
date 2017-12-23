<?php

namespace App;

use App\Traits\HasContact;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasContact;

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

    public function delete()
    {
        $this->contact()->delete();
        $this->family()->delete();
        $this->income()->delete();
        parent::delete();
    }

    public function scopeTypeahead($query)
    {
        return $query->where('id', 1);
    }

}
