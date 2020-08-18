<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Model\User','user_id')->first();
    }

    public function book(){
        return $this->belongsTo('App\Model\Book','book_id')->first();
    }
}
