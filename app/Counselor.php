<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    public function contact()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }

}
