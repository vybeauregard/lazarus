<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurnAways extends Model
{
    protected $primaryKey = 'date';

    public $incrementing = false;

    protected $dates = ['date'];
}
