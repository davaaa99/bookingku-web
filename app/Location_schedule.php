<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location_schedule extends Model
{
    use SoftDeletes;

    /**
     * Assign new primary key
     * 
     */
    protected $primaryKey = 'id_location_schedule';

    /**
     * Set incrementing primary key to false
     * 
     */
    public $incrementing = false;
}
