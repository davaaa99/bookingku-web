<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kind_of_field extends Model
{
    use SoftDeletes;

    /**
     * Assign new primary key
     * 
     */
    protected $primaryKey = 'id_kind_of_field';

    /**
     * Set incrementing primary key to false
     * 
     */
    public $incrementing = false;
}
