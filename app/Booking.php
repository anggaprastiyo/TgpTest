<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    public function getPriceAttribute($value){
        return 'S$'.$value;
    }
}
