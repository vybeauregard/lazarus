<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }

}
