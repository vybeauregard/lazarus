<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = [
        'type',
    ];

    public $timestamps = false;

    public function request()
    {
        return $this->belongsToMany(Request::class);
    }

    public function getTypes()
    {
        return SELF::all();
    }
}
