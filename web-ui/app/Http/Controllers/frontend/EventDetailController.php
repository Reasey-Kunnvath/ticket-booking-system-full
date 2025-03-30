<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventDetailController extends Controller
{
    public function EventDetailIndex(Request $request, $id){
        $event_id = $id;
        return view('frontend.event_detail.event-detail')
        ->with('event_id', $event_id);
    }
}
