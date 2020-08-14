<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Model\User','user_id')->first();
    }
}
