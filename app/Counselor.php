<?php

namespace App;

use App\Traits\HasContact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Counselor extends Model
{
    use HasContact, SoftDeletes;

    protected $fillable = [
        'parish_id'
    ];

    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }

    public function parish()
    {
        return $this->belongsTo(Parish::class);
    }

    public static function create($attributes = [])
    {
        $model = static::query()->create($attributes);
        $contact = new Contact($attributes);
        $model->contact()->save($contact);
        $model->push();
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
        $this->push();
        return $this;
    }

    public function delete()
    {
        $this->contact()->delete();
        return parent::delete();
    }

}
