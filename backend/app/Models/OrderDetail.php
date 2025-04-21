<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = [
        'evt_id',
        'ticket_id',
        'QTY',
        'ticket_price',
        'order_id'
    ];

    // public function order()
    // {
    //     return $this->belongsTo(Order::class, 'order_id', 'order_id');
    // }

    // public function eventTicket()
    // {
    //     return $this->belongsTo(EventTicket::class, 'ticket_id', 'ticket_id');
    // }
}
