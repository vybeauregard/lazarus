<?php

namespace App;

use App\Traits\HasContact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class Client extends Model
{
    use HasContact, SoftDeletes;

    protected $fillable = [
        'date',
        'dob',
        'gender',
        'ethnicity',
        'birth_country',
        'veteran_status',
        'incarceration',
        'source',
        'insurance',
    ];

    public $dates = [
        'date',
        'dob'
    ];

    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }

    public function family()
    {
        return $this->hasMany(Family::class);
    }

    public function income()
    {
        return $this->hasMany(Income::class);
    }

    public function visit()
    {
        return $this->hasMany(Visit::class);
    }

    public function scopeTypeaheadRelations($query)
    {
        return $query->with(['contact', 'family']);
    }

    public static function create($attributes = [])
    {
        $model = static::query()->create($attributes);
        $contact = new Contact($attributes);
        $income = new Income($attributes);
        if(array_key_exists('family', $attributes)) {
            foreach($attributes['family'] as $person) {
                $model->family()->save(new Family($person));
            }
        }
        $model->contact()->save($contact);
        $model->income()->save($income);
        return $model;
    }

    public function updateWithRelations($attributes = [])
    {
        parent::fill($attributes);
        if(is_null($this->contact)){
            $contact = new Contact($attributes);
            $this->contact()->save($contact);

        } else {
            $this->contact->fill($attributes);
        }
//        if(is_null($this->income)){
//            $income = new Income($attributes);
//            $this->income()->save($income);
//        } else {
//            $this->income->fill($attributes);
//        }

        $this->push();

        return $this;
    }

    public function delete()
    {
        $this->contact()->delete();
        $this->family()->delete();
        $this->income()->delete();
        return parent::delete();
    }

    public function getTypeaheadNameAttribute()
    {
        if($this->dob) {
            return "{$this->name} ({$this->dob->format('m/d/Y')})";
        }
        return $this->name;
    }

    public static function getPaginatedSortedList()
    {
        $clients = self::with(['contact', 'family'])->get()->sortBy(function($client){
            return Str::slug($client->contact->last_name) . ',' . Str::slug($client->contact->first_name);
        });
        if(request()->has('page')) {
            $page = request('page');
        } else {
            $page = 1;
        }
        $clients = new LengthAwarePaginator($clients->forPage($page, 15), $clients->count(), 15);

        return $clients->withPath(route('clients.index'));
    }

}
