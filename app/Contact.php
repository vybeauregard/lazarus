<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

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
        'emergency_phone',
        'email',
    ];

    public function contactable()
    {
        return $this->morphTo();
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getFormattedPhoneAttribute()
    {
        if (!$this->phone) {
            return "No phone listed";
        }

        return implode("", [
            "(",
            substr($this->phone, 0, 3),
            ")",
            " ",
            substr($this->phone, 3, 3),
            "-",
            substr($this->phone, 6),
        ]);
    }

    public function getLinkedEmailAttribute()
    {
        if (!$this->email) {
            return "No email listed";
        }
        return '<a href="mailto:' . $this->email . '">' . $this->email . '</a>';
    }

}
