<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }
}
