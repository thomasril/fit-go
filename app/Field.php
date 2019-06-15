<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    function schedules() {
        return $this->hasMany(Schedule::class);
    }
}
