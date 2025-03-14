<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'paymentmethod';

    protected $fillable = [
        'method_name'
    ];
}
