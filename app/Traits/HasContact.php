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

    public function getFullNameAttribute()
    {
        if(!$this->contact) {
            return "no name";
        }
        return "{$this->contact->first_name} {$this->contact->middle_initial} {$this->contact->last_name}";
    }

    public function getFormattedAddressAttribute()
    {
        $address = [
            $this->contact->address1,
        ];
        if($this->contact->address2) {
            $address[] = $this->contact->address2;
        }
        if($this->contact->city) {
            $address[] = "{$this->contact->city}, {$this->contact->state} {$this->contact->zip}";
        } else {
            $address[] = "{$this->contact->state} {$this->contact->zip}";
        }

        return $address;
    }

    public function getFormattedPhoneAttribute()
    {
        return $this->formatPhone($this->contact->phone);
    }

    public function getFormattedEmergencyPhoneAttribute()
    {
        return $this->formatPhone($this->contact->emergency_phone);
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

    private function formatPhone($phone)
    {
        if(strlen($phone) == 10) {
            return implode("", [
                "(",
                substr($phone, 0, 3),
                ") ",
                substr($phone, 3, 3),
                "-",
                substr($phone, 6, 4),
                ]);
        } else {
            return $phone;
        }
    }

}
