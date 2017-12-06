<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'date',
        'dob'
    ];
    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }
}
