<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Field extends Model
{
    use SoftDeletes;

     protected $fillable = [
        'id_field','field_name', 'field_type',
    ];
}
