<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use SoftDeletes;

    protected $table = "income";

    protected $fillable = [
        'date',
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
        'apartment_name',
        'insurance_type',
        'homeless',
        'shelter',
        'private_res',
        'section_8',
        'arha',
        'other',
    ];

    protected $dates = [
        'date'
    ];

    protected $checkboxes = [
        'homeless',
        'shelter',
        'private_res',
        'section_8',
        'arha',
        'other',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getCheckboxesCollection()
    {
        return collect($this->checkboxes);
    }

}
