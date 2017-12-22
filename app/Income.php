<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = "income";

    protected $fillable = [
        'monthly_income',
        'part_time',
        'pt_employer',
        'full_time',
        'ft_employer',
        'position',
        'income',
        'unemployed',
        'looking',
        'applying',
        'day_labor',
        'rent',
        'ssi',
        'snap',
        'tanf',
        'child_support',
        'utility_benefits',
        'veteran_benefits',
        'other_income',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}