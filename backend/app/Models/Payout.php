<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    protected $table = 'payout';
    protected $fillable = [
        'total_sales',
        'platform_commission',
        'net_payout',
        'currency',
        'payout_date',
        'ref_number',
        'notes',
        'evt_provider_id',
        'evt_id',
        'payout_status_id',
        'method_id'
    ];
}