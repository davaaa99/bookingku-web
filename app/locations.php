<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class locations extends Model
{
    use SoftDeletes;

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
        'isdeleted',        
    ];

    protected $boolean = ['isdeleted'];
}
