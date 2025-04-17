<?php

namespace App\Http\Controllers\Api\General\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FHomePageController extends Controller
{
    public function popularEvents(){
       $popularEvent = Event::select([
            'events.evt_id',
            'events.evt_name',
            'events.evt_start_date',
            'events.evt_address',
            'events.evt_status',
            'ticket_data.ticket_price',
            'ticket_data.ticket_in_stock',
            Event::raw('SUM(orders.QTY) as total_quantity_sold'),
        ])
        ->joinSub(
            DB::table('event_tickets')
                ->select([
                    'evt_id',
                    DB::raw('MIN(ticket_price) as ticket_price'),
                    DB::raw('SUM(ticket_in_stock) as ticket_in_stock'),
                ])
                ->groupBy('evt_id'),
            'ticket_data',
            'events.evt_id',
            '=',
            'ticket_data.evt_id'
        )
        ->join('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        ->join('orders', 'event_tickets.ticket_id', '=', 'orders.ticket_id')
        ->groupBy([
            'events.evt_id',
            'events.evt_name',
            'events.evt_start_date',
            'events.evt_address',
            'events.evt_status',
            'ticket_data.ticket_price',
            'ticket_data.ticket_in_stock',
        ])
        ->orderByDesc('total_quantity_sold')
        ->limit(6)
        ->get();

        if($popularEvent->isEmpty()){
            return response()->json([
                'message' => 'No event found'
            ], 404);
        }

        return response()->json([
            'data'=> $popularEvent
        ],200);
    }
    public function comingEvents(){
         $coming = Event::select([
            'events.evt_id',
            'events.evt_name',
            'events.evt_start_date',
            'events.evt_address',
            'events.evt_status',
            Event::raw('MIN(event_tickets.ticket_price) as ticket_price'),
            Event::raw('SUM(event_tickets.ticket_in_stock) as ticket_in_stock'),
        ])
        ->Join('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        ->where('events.evt_start_date', '>', now())
        ->groupBy([
            'events.evt_id',
        ])
        ->limit(6)
        ->get();

        if($coming->isEmpty()){
            return response()->json([
                'message' => 'No event found'
            ], 404);
        }

        return response()->json([
                'data' => $coming
        ],200);
    }
}
