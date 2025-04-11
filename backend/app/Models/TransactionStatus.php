<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transactionStatus extends Model
{
    protected $table = 'transactionstatus';

    protected $primaryKey = 'status_id';

    protected $fillable = [
        'status_name'
    ];
}
