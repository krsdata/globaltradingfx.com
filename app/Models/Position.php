<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'user_name', 'market_name','bid_amount', 'p_l_amount', 'date_time', 'status',
    ];



    
}



