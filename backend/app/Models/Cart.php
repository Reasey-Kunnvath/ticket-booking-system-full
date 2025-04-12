<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'event_id',
        'ticket_id',
        'quantity',
        'total_price',
    ];
}
