<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment_booking extends Model
{
    use SoftDeletes;
    
    protected $table = 'payment_booking';
}
