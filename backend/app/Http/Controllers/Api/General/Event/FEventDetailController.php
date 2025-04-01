<?php

namespace App\Http\Controllers\Api\General\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FEventDetailController extends Controller
{

    public function EventDetailIndex($id)
    {
    //    dd($id);
       $eventDetail = DB::table('events')
            ->select(
                'events.evt_id',
                'events.evt_name',
                DB::raw("DATE_FORMAT(events.evt_start_date, '%b %d') as mmmdd"),
                DB::raw("DATE_FORMAT(events.evt_start_date, '%a %Y') as dddyyyy"),
                DB::raw("DATE_FORMAT(events.evt_start_date, '%l:%i %p %W %D %b %Y' ) as full_date"),
                'events.evt_address',
                'events.evt_status',
                'events.evt_description',
                'events.evt_address_link',
                'event_tickets.ticket_id',
                'event_tickets.ticket_title',
                'event_tickets.ticket_price',
                'event_tickets.ticket_in_stock',
                'event_tickets.ticket_description',
            )
            ->rightJoin('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
            ->where('events.evt_id', '=', $id)
            ->get();
        return response()->json([
            'ticket_data' => $eventDetail,
            'event_data' => [
                'evt_id' => $eventDetail->first()->evt_id,
                'evt_name' => $eventDetail->first()->evt_name,
                'ticket_in_stock' => $eventDetail->first()->ticket_in_stock,
                'full_date' => $eventDetail->first()->full_date,
                'evt_address' => $eventDetail->first()->evt_address,
                'evt_address_link' => $eventDetail->first()->evt_address_link
            ]
        ], 200);
    }
}
