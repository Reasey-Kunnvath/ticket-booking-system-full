<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'amount',
        'currency',
        'order_id',
        'method_id',
        'status_id'
    ];
}
