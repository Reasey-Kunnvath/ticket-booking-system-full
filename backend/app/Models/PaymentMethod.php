<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'paymentmethod';

    protected $primaryKey = 'method_id';

    protected $fillable = [
        'method_name'
    ];
}
