<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'dob',
        'sex',
        'birth_country',
        'insurance',
        'relationship'
    ];

    public $dates = [
        'dob',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
