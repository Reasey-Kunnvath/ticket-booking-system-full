<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
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
        'evt_status'
    ];

    // public function tickets()
    // {
    //     return $this->hasMany(EventTicket::class, 'evt_id', 'evt_id');
    // }
}