<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'role_id'
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

    function property() {
        return $this->hasOne(Property::class, 'owner_id', 'id');
    }

    function role() {
        return $this->belongsTo(Role::class);
    }

    function subscriptions() {
        return $this->hasMany(Subscription::class, 'owner_id', 'id');
    }

    function review(){
        return $this->hasOne(Review::class, 'customer_id', 'id');
    }
}
