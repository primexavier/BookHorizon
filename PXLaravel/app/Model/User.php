<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blog()
    {
        return $this->hasMany('App\Model\Blog');
    }

    public function chart()
    {
        return $this->hasMany('App\Model\Chart');
    }

    public function address()
    {
        return $this->hasMany('App\Model\Address');
    }

    public function wishlist()
    {
        return $this->hasMany('App\Model\Wishlist');
    }

    public function hasMembership()
    {
        return $this->hasMany('App\Model\UserMembership');
    }
}
