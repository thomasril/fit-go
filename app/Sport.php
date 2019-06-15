<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    function property() {
        return $this->belongsTo(Property::class);
    }

    function fields() {
        return $this->hasMany(Field::class);
    }
}
