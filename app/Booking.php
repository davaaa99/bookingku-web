<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    
    use SoftDeletes;

    /**
     * Assign new primary key
     * 
     */
    protected $primaryKey = 'id_booking';

    /**
     * Set incrementing primary key to false
     * 
     */
    public $incrementing = false;

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
