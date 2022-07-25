<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $fillable = [
        'request_id', 'request_by','amount', 'date_time', 'status',
    ];



    
}



