<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    /**
     * Assign new primary key
     * 
     */
    protected $primaryKey = 'id_location';

    /**
     * Set incrementing primary key to false
     * 
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_location',
        'id_users',
        'location_name',
        'location_address',
        'description',
        'open_time',
        'closing_time',
        'location_photo',
        'city',
        'created_by',
        'updated_by',       
    ];
}
