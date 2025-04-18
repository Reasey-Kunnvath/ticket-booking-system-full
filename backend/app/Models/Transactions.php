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

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function method()
    {
        return $this->belongsTo(PaymentMethod::class, 'method_id');
    }

    public function status()
    {
        return $this->belongsTo(transactionStatus::class, 'status_id');
    }
}
