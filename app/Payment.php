<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    /**
     * Assign new primary key
     * 
     */
    protected $primaryKey = 'id_payment';

    /**
     * Set incrementing primary key to false
     * 
     */
    public $incrementing = false;

    protected $fillable = [
        'id_payment',
        'report_status',
    ];
}
