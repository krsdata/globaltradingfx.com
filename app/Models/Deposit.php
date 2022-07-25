<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'txn_id', 'amount','receipt', 'date_time', 'status',
    ];



    
}



