<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    public function booking(){
        return $this->hasOne('schedules','id_schedule','id_schedule');
    }
}