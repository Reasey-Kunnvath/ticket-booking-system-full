<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transactions';

    protected $primaryKey = "trans_id";

    protected $fillable = [
        'amount',
        'currency',
        'created_at',
        'order_id',
        'method_id',
        'status_id'
    ];
}
