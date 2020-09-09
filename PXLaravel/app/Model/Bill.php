<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function transaction()
    {
        return $this->belongsTo('App\Model\Transaction','transaction_id')->first();
    }
}
