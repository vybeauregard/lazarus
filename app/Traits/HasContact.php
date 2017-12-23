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

    public function typeahead()
    {
        return $this->query()
            ->with('contact')
            ->get()
            ->map(function ($contact){
                return [
                    'name' => $contact->name,
                    'id'    => $contact->id,
                ];
            });
    }

}
