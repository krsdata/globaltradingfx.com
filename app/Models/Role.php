<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    CONST ADMIN = '1';
    CONST STAFF = '2';
    CONST CUSTOMER = '3';

    protected $fillable = [
        'name'
    ];
}
