<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    protected $fillable = ['payment_status'];

    use SoftDeletes;
    protected $date =['deleted_at'];
}