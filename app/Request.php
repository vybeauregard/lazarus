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
        "action",
        "notes",
    ];

    protected $requestTypes = [
        "0" => "Clothing",
        "1" => "Clothing Voucher",
        "2" => "Electric",
        "3" => "Electric Disconnect",
        "4" => "Gas",
        "5" => "Gas Disconnect",
        "6" => "Water/Sewer",
        "7" => "Water/Sewer Disconnect",
        "8" => "Dental",
        "9" => "Security Deposit",
        "10" => "Rent",
        "11" => "Eviction",
        "12" => "Mortgage",
        "13" => "Glasses/Contacts",
        "14" => "Food",
        "15" => "Medical",
    ];

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

    public function getTypesAttribute()
    {
        return collect($this->requestTypes);
    }

    public function getFormattedTypeAttribute()
    {
        return $this->requestTypes[$this->type];
    }
}
