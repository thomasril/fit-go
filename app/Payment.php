<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function bank(){
        return $this->hasOne(MasterBank::class, 'id', 'bank_id');
    }
}
