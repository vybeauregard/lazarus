<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $dates = [
        'date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function counselor()
    {
        return $this->belongsTo(Counselor::class);
    }
}
