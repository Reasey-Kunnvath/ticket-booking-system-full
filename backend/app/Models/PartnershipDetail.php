<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnershipDetail extends Model
{
    protected $table = 'partnership_details';

    protected $fillable = [
        'org_name',
        'org_type',
        'org_address',
        'org_email',
        'org_phone_number',
        'ambassador_name',
        'ambassador_email',
        'ambassador_phone',
        'status',
        'req_status',
        'user_id'
    ];
}