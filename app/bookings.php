<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bookings extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_booking',
        'id_schedule',
        'client_email',
        'user_email',
        'payment_type',
        'payment_status',
        'created_at',
        'crated_by',
        'uplated_at',
        'update_by',
        'deleted_at'
    ];

    
}