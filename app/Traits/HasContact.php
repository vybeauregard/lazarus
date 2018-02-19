<?php

namespace App\Traits;

use App\Client;
use App\Family;

trait HasContact
{
    protected $phones = [
        'phone',
        'emergency_phone'
    ];

    public function getNameAttribute()
    {
        //Parishes have contact info, but name data lives on the parish model
        if (array_key_exists("name", $this->attributes)) {
            return $this->attributes['name'];
        }
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
        if(!$this->contact) {
            return [];
        }
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
        if(!$this->contact) {
            return "";
        }
        return $this->formatPhone($this->contact->phone);
    }

    public function getFormattedEmergencyPhoneAttribute()
    {
        if(!$this->contact) {
            return "";
        }
        return $this->formatPhone($this->contact->emergency_phone);
    }

    public function getPhonesCollection()
    {
        return collect($this->phones);
    }


    public function typeahead()
    {
        return $this->query()
            ->when(get_class($this) == Client::class, function($query){
                return $query->with(['contact', 'family']);
            }, function($query){
                return $query->with('contact');
            })
            ->get()
            ->pipe(function ($typeahead) {
                //include family members in collection
                return $typeahead->each(function($client) use ($typeahead) {
                    if ($client->family) {
                        $typeahead->push($client->family);
                    }
                });
            })
            ->flatten()
            ->map(function ($contact) {
                if (get_class($contact) == Family::class) {
                    //remap family ids to the related client id
                    $contact->id = $contact->client_id;
                }
                return [
                    'name'  => $contact->typeaheadName,
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
