<?php

namespace App;

use App\Traits\HasContact;
use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    use HasContact;

    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }

}
