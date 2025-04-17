<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $table = 'coupons';

    protected $primaryKey = 'coupons_id';

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

    public function event()
    {
        return $this->belongsTo(Event::class, 'evt_id');
    }
}