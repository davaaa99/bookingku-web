<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class users extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_users',
        'email',
        'password',
        'name',
        'account_number',
        'phone_number',
        'users_type',
        'users_photo',
        'api_token',
    ];

    protected $hidden = [
        'password',
        'api_token',
    ];
}
