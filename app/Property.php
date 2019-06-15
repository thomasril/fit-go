<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name',
        'description',
        'latitude',
        'longitude',
        'address',
        'owner_id',
        'open_hour',
        'close_hour',
        'status'
    ];

    // Relationship
    function images() {
        return $this->hasMany(Image::class);
    }

    function sports() {
        return $this->hasMany(Sport::class);
    }

    function facilities() {
        return $this->hasMany(Facility::class);
    }

    function payments() {
        return $this->hasMany(Payment::class);
    }

    function user() {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    function reviews(){
        return $this->hasMany(Review::class);
    }

    function ratings(){
        return $this->hasMany(Rating::class);
    }
}
