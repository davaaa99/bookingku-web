<?php

namespace App;
use SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    protected $fillable = ['payment_status'];
    protected $deleted =['isDeleted'];
}