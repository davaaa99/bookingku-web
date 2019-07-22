<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class payment_booking extends Model
{
    use SoftDeletes;
    protected $table='payment_booking';
}
