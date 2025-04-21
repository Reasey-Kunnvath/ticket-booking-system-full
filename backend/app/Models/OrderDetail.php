<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $primaryKey = 'order_detail_id';

    protected $fillable = [
        'evt_id',
        'ticket_id',
        'QTY',
        'ticket_price',
        'order_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'evt_id', 'evt_id');
    }

    // public function eventTicket()
    // {
    //     return $this->belongsTo(EventTicket::class, 'ticket_id', 'ticket_id');
    // }
}
