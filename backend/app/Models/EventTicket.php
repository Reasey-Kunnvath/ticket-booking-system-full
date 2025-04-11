<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventTicket extends Model
{
    use HasFactory;
    protected $table = 'event_tickets';

    protected $primaryKey = 'ticket_id';

    protected $fillable = [
        'ticket_title',
        'ticket_price',
        'ticket_in_stock',
        'ticket_description',
        'ticket_expiry_date',
        'evt_id'
    ];


    public function event()
    {
        return $this->belongsTo(Event::class, 'evt_id');
    }
    // protected $primaryKey = 'ticket_id';

    // public function event()
    // {
    //     return $this->belongsTo(Event::class, 'evt_id', 'evt_id');
    // }

    public function orders()
    {
        return $this->hasMany(Order::class, 'ticket_id', 'ticket_id');
    }
}
