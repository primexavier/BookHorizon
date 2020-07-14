<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'isbn', 'publication_city', 'format','pages','weight','dimension','purchase_price','start_qty','purchase_date','vendor',
    ];
}
