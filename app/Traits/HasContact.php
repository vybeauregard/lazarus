<?php

namespace App\Traits;

trait HasContact
{
    public function getNameAttribute()
    {
        if(!$this->contact) {
            return "no name";
        }
        return "{$this->contact->first_name} {$this->contact->last_name}";
    }

}
