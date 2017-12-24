<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'request_date',
        'client_id',
        'date',
        'type',
        'amount',
        'due_date',
        'remaining',
        'total_payments',
        'payment_count',
        'last_payment',
        'closed',
        'budgeted',
        'budget_date',
    ];

    protected $dates = [
        'request_date',
        'date',
        'due_date',
        'last_payment',
        'budget_date',
    ];

    protected $checkboxes = [
        'closed',
        'budgeted'
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
