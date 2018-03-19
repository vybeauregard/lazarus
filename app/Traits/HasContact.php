<?php

namespace App\Traits;

use App\Contact;

trait HasContact
{
    protected $phones = [
        'phone',
        'emergency_phone'
    ];

    public function findByNameOrCreate($array)
    {
        extract($array);
        $contact = Contact::where('first_name', $first_name)->where('last_name', $last_name)->get();
        if($contact->count()) {
            return $contact->first()->contactable;
        }
        return static::create($array);
    }

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

    public function getTypeaheadFormattedAttribute()
    {
        return [
            'name'  => $this->typeaheadName,
            'id'    => $this->id,
        ];
    }

    public function getTypeaheadNameAttribute()
    {
        return $this->name;
    }

    public function getPhonesCollection()
    {
        return collect($this->phones);
    }

    public function scopeTypeaheadRelations($query)
    {
        return $query->with('contact');
    }

    public function typeahead()
    {
        return $this->typeaheadRelations()
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
                return $contact->typeaheadFormatted;
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
