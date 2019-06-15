<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    function field() {
        return $this->belongsTo(Field::class);
    }

    function user() {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
