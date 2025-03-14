<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

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
}