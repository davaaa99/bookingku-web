<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class payment_booking extends Model
{
    use SoftDeletes;
    protected $table='payment_booking';
    
     /**
     * Assign new primary key
     * 
     */
    protected $primaryKey = 'id_field';

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
        'id_field',
        'id_kind_of_field',
        'id_location',
        'field_type',
        'field_name',
        'field_photo',
        'updated_by',
        'created_by',
    ];

    
}
