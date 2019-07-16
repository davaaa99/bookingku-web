<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
     protected $fillable = [
        'id_field','field_name', 'field_type','Description','Foto',
    ];
}
