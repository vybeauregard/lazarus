<?php

namespace App;

use App\Traits\HasContact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return "{$this->name} ({$this->dob->format('m/d/Y')})";
    }

}
