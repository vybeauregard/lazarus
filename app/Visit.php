<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visit extends Model
{
    use SoftDeletes;

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

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
