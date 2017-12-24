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

    public function delete()
    {
        $this->contact()->delete();
        parent::delete();
    }

}
