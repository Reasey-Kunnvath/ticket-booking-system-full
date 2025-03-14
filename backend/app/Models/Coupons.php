<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $table = 'coupons';

    protected $fillable = [
        'coupons_title',
        'coupons_type',
        'coupons_value',
        'start_date',
        'end_date',
        'status',
        'max_use',
        'createdby',
        'evt_id'
    ];
}
