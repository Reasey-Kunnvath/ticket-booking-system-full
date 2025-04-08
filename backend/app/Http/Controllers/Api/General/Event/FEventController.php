<?php

namespace App\Http\Controllers\Api\General\Event;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Order;

class FEventController extends Controller
{
    public function allevent(){
        // $event = DB::table('events')
        // ->select(
        //         'events.evt_id',
        //         'events.evt_name',
        //         'events.evt_start_date',
        //         'events.evt_address',
        //         'events.evt_status',
        //         'event_tickets.ticket_id',
        //         'event_tickets.ticket_title',
        //         'event_tickets.ticket_price',
        //         'event_tickets.ticket_in_stock'
        //         )
        // ->rightJoin('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        // ->where('events.evt_status', '=', '1')
        // ->get();
        // $event = Event::where('evt_status', '1')->get();

        $event = Event::select([
                    'events.evt_id',
                    'events.evt_name',
                    'events.evt_start_date',
                    'events.evt_address',
                    'events.evt_status',
                    Event::raw('MIN(event_tickets.ticket_price) as ticket_price'),
                    Event::raw('SUM(event_tickets.ticket_in_stock) as ticket_in_stock'),
                ])
                ->join('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
                ->where('events.evt_status', '1')
                ->groupBy([
                    'events.evt_id',
                ])
                ->paginate(9);

        return response()->json([
            'data' => $event
        ],200);
    }
     public function eventcoming(){
        // $event = DB::table('event_tickets')
        // ->select('event_tickets.ticket_id',
        //         'event_tickets.ticket_title',
        //         'event_tickets.ticket_price',
        //         'event_tickets.ticket_in_stock',
        //         'events.evt_name',
        //         'events.evt_start_date',
        //         'events.evt_address')
        // ->leftJoin('events', 'event_tickets.evt_id', '=', 'events.evt_id')
        // ->where('events.evt_start_date', '>', now())
        // ->get();

        $event = Event::select([
            'events.evt_id',
            'events.evt_name',
            'events.evt_start_date',
            'events.evt_address',
            'events.evt_status',
            Event::raw('MIN(event_tickets.ticket_price) as ticket_price'),
            Event::raw('SUM(event_tickets.ticket_in_stock) as ticket_in_stock'),
        ])
        ->join('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        ->where('events.evt_start_date', '>', now())
        ->groupBy([
            'events.evt_id',
        ])
        ->paginate(9);

        if($event->isEmpty()){
            return response()->json([
                'message' => 'No event found'
            ], 404);
        }

        return response()->json([
                'data' => $event
        ],200);

    }
    public function mostpopular(){
        // Phorakden Testing Pagination
            // $popularEvent=DB::table('events')
            // ->select('*')
            // ->paginate(9);

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
        ->paginate(9);

        if($popularEvent->isEmpty()){
            return response()->json([
                'message' => 'No event found'
            ], 404);
        }

        return response()->json([
            'data'=> $popularEvent
        ],200);

    }
    public function concert(){
    //    $eventConcert = DB::table('events')
    //     ->select(
    //             'events.evt_id',
    //             'events.evt_name',
    //             'events.evt_start_date',
    //             'events.evt_address',
    //             'events.evt_status',
    //             'event_tickets.ticket_id',
    //             'event_tickets.ticket_title',
    //             'event_tickets.ticket_price',
    //             'event_tickets.ticket_in_stock'
    //             )
    //     ->rightJoin('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
    //     ->where('events.evt_status', '=', '1')
    //     ->where('cate_id', '=', '1')
    //     ->get();

        $eventConcert = Event::select([
            'events.evt_id',
            'events.evt_name',
            'events.evt_start_date',
            'events.evt_address',
            'events.evt_status',
            Event::raw('MIN(event_tickets.ticket_price) as ticket_price'),
            Event::raw('SUM(event_tickets.ticket_in_stock) as ticket_in_stock'),
        ])
        ->join('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        ->where('events.evt_status', '1')
        ->where('cate_id', '=', '1')
        ->groupBy([
            'events.evt_id',
        ])
        ->paginate(9);

        if($eventConcert->isEmpty()){
            return response()->json([
                'message' => 'No event found'
            ], 404);
        }

        return response()->json([
            'data'=> $eventConcert
        ],200);
    }
    public function conferences(){
        $eventConferences = Event::select([
            'events.evt_id',
            'events.evt_name',
            'events.evt_start_date',
            'events.evt_address',
            'events.evt_status',
            Event::raw('MIN(event_tickets.ticket_price) as ticket_price'),
            Event::raw('SUM(event_tickets.ticket_in_stock) as ticket_in_stock'),
        ])
        ->join('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        ->where('events.evt_status', '1')
        ->where('cate_id', '=', '3')
        ->groupBy([
            'events.evt_id',
        ])
        ->paginate(9);

        if($eventConferences->isEmpty()){
            return response()->json([
                'message' => 'No event found'
            ], 404);
        }

        return response()->json([
            'data'=> $eventConferences
        ],200);

    }
    public function sport(){
        // Phorakden Testing Pagination
            // $eventSport=DB::table('events')
            // ->select('*')
            // ->paginate(9);


        $eventSport = Event::select([
            'events.evt_id',
            'events.evt_name',
            'events.evt_start_date',
            'events.evt_address',
            'events.evt_status',
            Event::raw('MIN(event_tickets.ticket_price) as ticket_price'),
            Event::raw('SUM(event_tickets.ticket_in_stock) as ticket_in_stock'),
        ])
        ->join('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        ->where('events.evt_status', '1')
        ->where('cate_id', '=', '4')
        ->groupBy([
            'events.evt_id',
        ])
        ->get();

        if($eventSport->isEmpty()){
            return response()->json([
                'message' => 'No event found'
            ], 404);
        }

        return response()->json([
            'data'=> $eventSport
        ],200);
    }
}