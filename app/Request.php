<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "visit_id",
        "type",
        "amount",
        "original_amount",
        "actions",
        "notes",
    ];


    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class);
    }

    public function requestType()
    {
        return $this->belongsTo(RequestType::class, 'type');
    }

    public function getTypesAttribute()
    {
        return RequestType::all()->pluck('type', 'id');
    }

    public function getTypeId($type)
    {
        return $this->types->search($type);
    }

    public function getFormattedTypeAttribute()
    {
        return $this->requestType ? $this->requestType->type : 'unknown request';
    }

    public function getFormattedActionsAttribute()
    {
        return $this->actions->pluck('type')->implode(', ');
    }


    /**
     * Set the request action(s).
     *
     * @param  string  $value
     * @return void
     */
    public function setActionsAttribute($value)
    {
        if($this->exists) {
            $this->actions()->sync($value);
        }
    }


}
