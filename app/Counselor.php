<?php

namespace App;

use App\Traits\HasContact;
use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    use HasContact;

    protected $fillable = [];

    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }

    public function delete()
    {
        $this->contact()->delete();
        parent::delete();
    }

}
