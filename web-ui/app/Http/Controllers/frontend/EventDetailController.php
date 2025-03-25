<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventDetailController extends Controller
{
    public function EventDetailIndex(){
        return view('frontend.event_detail.event-detail');
    }
}
