<?php

namespace App;

use App\Traits\HasContact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parish extends Model
{
    use HasContact, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
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

    }

    public function delete()
    {
        $this->contact()->delete();
        return parent::delete();
    }
}
