<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey = "order_id";

    protected $fillable = [
        'QTY',
        'total_amount',
        'created_at',
        'user_id',
        'ticket_id',
        'status_id',
        'coupon_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket()
    {
        return $this->belongsTo(EventTicket::class, 'ticket_id', 'ticket_id');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id', 'status_id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupons::class, 'coupons_id', 'coupons_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }
}
