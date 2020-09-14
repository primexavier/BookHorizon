<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'publisher_id','language_id','supplier_id','author_id','title', 'isbn', 'publication_city', 'format','pages','weight','dimension','purchase_price','start_qty','purchase_date','vendor',
    ];
    protected $dates = ['deleted_at'];
    public function author()
    {
        return $this->belongsTo('App\Model\Author')->first()->name;
    }
    public function bookImage()
    {
        return $this->hasOne('App\Model\BookImage')->first();
    }
}
