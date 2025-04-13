<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';

    protected $primaryKey = 'evt_id';
    // protected $primaryKey = 'evt_id';

    protected $fillable = [
        'evt_name',
        'evt_description',
        'evt_policy',
        'evt_start_date',
        'evt_end_date',
        'evt_address',
        'evt_address_link',
        'status',
        'evt_status',
        'cate_id',
        'partnership_id'
    ];

    public function partnership()
    {
        return $this->belongsTo(PartnershipDetail::class, 'partnership_id');
    }
    public function eventCategory()
    {
        return $this->belongsTo(EventCategory::class, 'cate_id',);
    }

    public function coupons()
    {
        return $this->hasMany(Coupons::class, 'coupons_id');
    }

    public function tickets()
    {
        return $this->hasMany(EventTicket::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function cartItems()
    {
        return $this->hasMany(Cart::class, 'ticket_id');
    }
}



    // public function tickets()
    // {
    //     return $this->hasMany(EventTicket::class, 'evt_id', 'evt_id');
    // }
