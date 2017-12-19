<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = [
        'name',
        'dob',
        'sex',
        'birth_country',
        'insurance',
        'relationship'
    ];

    public function client()
    {
        return $this->belongsTo(Client::model);
    }
}
