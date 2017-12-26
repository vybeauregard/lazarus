<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'name',
        'given_info',
        'application_submitted',
        'application_approved',
        'program_start',
        'completed',
        'denied',
        'denial',
        'denial_details',
        'notes',
    ];

    protected $dates = [
        'given_info',
        'application_submitted',
        'application_approved',
        'program_start',
    ];
    protected $checkboxes = [
        'completed',
        'denied'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getDatesCollection()
    {
        return collect($this->dates);
    }

    public function getCheckboxesCollection()
    {
        return collect($this->checkboxes);
    }
}
