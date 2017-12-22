<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'date',
        'client_id',
        'counselor_id',
        'request',
        'action'
    ];

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
