<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'isbn', 'publication_city', 'format','pages','weight','dimension','purchase_price','start_qty','purchase_date','vendor',
    ];
    protected $dates = ['deleted_at'];
}
