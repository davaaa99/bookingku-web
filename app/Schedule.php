<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    /**
     * Assign new primary key
     * 
     */
    protected $primaryKey = 'id_schedule';

    /**
     * Set incrementing primary key to false
     * 
     */
    public $incrementing = false;
}
