<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_initial',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'phone',
        'email',
//        'contactable_id',
//        'contactable_type',
    ];

    public function contactable()
    {
        return $this->morphTo();
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
