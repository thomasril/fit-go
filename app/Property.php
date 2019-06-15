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

    function images() {
        return $this->hasMany(Image::class);
    }

    function sports() {
        return $this->hasMany(Sport::class);
    }

    function facilities() {
        return $this->hasMany(Facility::class);
    }
}
