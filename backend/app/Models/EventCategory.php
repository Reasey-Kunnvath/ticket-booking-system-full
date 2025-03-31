<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    //
    protected $table = 'event_categories';

    protected $primaryKey = 'cate_id';

    protected $fillable = [
        'cate_name',
        'cate_description',
        'status',
        'created_by'
    ];
}
