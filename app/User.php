<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\VerifyEmail;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, SoftDeletes;

    /**
     * Assign new primary key
     * 
     */
    protected $primaryKey = 'id_users';

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
        'id_users',
        'email',
        'password',
        'name',
        'account_number',
        'phone_number',
        'users_type',
        'users_photo',
        'email_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['is_admin', 'is_client', 'is_user'];

    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getIsAdminAttribute()
    {
        return $this->attributes['users_type'] == '1';
    }

    /**
     * Get the client flag for the user.
     *
     * @return bool
     */
    public function getIsClientAttribute()
    {
        return $this->attributes['users_type'] == '2';
    }

    /**
     * Get the user flag for the user.
     *
     * @return bool
     */
    public function getIsUserAttribute()
    {
        return $this->attributes['users_type'] == '3';
    }

    /**
     * Override send email verification
     * 
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }
}
