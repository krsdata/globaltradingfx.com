<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    CONST ACTIVE = '1';
    CONST INACTIVE = '0';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'address','phone','dob','pan_number','photo', 'role_id','login_token', 'bank_name', 'account_number', 'ifsc_code', 'document_name', 'document_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    
}
