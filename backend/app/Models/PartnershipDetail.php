<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnershipDetail extends Model
{
    protected $table = 'partnership_details';

    protected $primaryKey = 'partnership_id';

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


    public function  user()
    {
        return $this->belongsTo(User::class);
    }

    public function  events()
    {
        return $this->hasMany(User::class);
    }
}
