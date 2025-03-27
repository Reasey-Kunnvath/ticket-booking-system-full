<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventTicket extends Model
{
    protected $table = 'event_tickets';
    protected $fillable = [
        'ticket_title',
        'ticket_price',
        'ticket_in_stock',
        'ticket_description',
        'ticket_expiry_date',
        'evt_id'
    ];


    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function orders(){
        return $this->hasMany(Order::class,'ticket_id','ticket_id');
    }

}
