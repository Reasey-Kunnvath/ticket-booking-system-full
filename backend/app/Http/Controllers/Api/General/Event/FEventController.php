<?php

namespace App\Http\Controllers\Api\General\Event;

use App\Models\Event;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\EventService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FEventController extends Controller
{
    protected $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }
    public function allevent(){
        return $this->eventService->allevent();
    }
    public function eventcoming(){
        return $this->eventService->eventcoming();
    }

    public function mostpopular(){
        return $this->eventService->mostpopular();
    }
    // public function allevent(){
    //     // $event = DB::table('events')
    //     // ->select(
    //     //         'events.evt_id',
    //     //         'events.evt_name',
    //     //         'events.evt_start_date',
    //     //         'events.evt_address',
    //     //         'events.evt_status',
    //     //         'event_tickets.ticket_id',
    //     //         'event_tickets.ticket_title',
    //     //         'event_tickets.ticket_price',
    //     //         'event_tickets.ticket_in_stock'
    //     //         )
    //     // ->rightJoin('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
    //     // ->where('events.evt_status', '=', '1')
    //     // ->get();
    //     // $event = Event::where('evt_status', '1')->get();

    //     $event = Event::select([
    //                 'events.evt_id',
    //                 'events.evt_name',
    //                 'events.evt_start_date',
    //                 'events.evt_address',
    //                 'events.evt_status',
    //                 Event::raw('MIN(event_tickets.ticket_price) as ticket_price'),
    //                 Event::raw('SUM(event_tickets.ticket_in_stock) as ticket_in_stock'),
    //             ])
    //             ->join('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
    //             ->where('events.evt_status', '1')
    //             ->groupBy([
    //                 'events.evt_id',
    //             ])
    //             ->paginate(9);

    //     return response()->json([
    //         'data' => $event
    //     ],200);
    // }
    // public function eventcoming(){
    //     $event = Event::select([
    //         'events.evt_id',
    //         'events.evt_name',
    //         'events.evt_start_date',
    //         'events.evt_address',
    //         'events.evt_status',
    //         Event::raw('MIN(event_tickets.ticket_price) as ticket_price'),
    //         Event::raw('SUM(event_tickets.ticket_in_stock) as ticket_in_stock'),
    //     ])
    //     ->Join('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
    //     ->where('events.evt_start_date', '>', now())
    //     ->groupBy([
    //         'events.evt_id',
    //     ])
    //     ->paginate(9);

    //     if($event->isEmpty()){
    //         return response()->json([
    //             'message' => 'No event found'
    //         ], 404);
    //     }

    //     return response()->json([
    //             'data' => $event
    //     ],200);

    // }
    // public function mostpopular(){
    //     // Phorakden Testing Pagination
    //         // $popularEvent=DB::table('events')
    //         // ->select('*')
    //         // ->paginate(9);

    //     $popularEvent = Event::select([
    //         'events.evt_id',
    //         'events.evt_name',
    //         'events.evt_start_date',
    //         'events.evt_address',
    //         'events.evt_status',
    //         'ticket_data.ticket_price',
    //         'ticket_data.ticket_in_stock',
    //         Event::raw('SUM(orders.QTY) as total_quantity_sold'),
    //     ])
    //     ->joinSub(
    //         DB::table('event_tickets')
    //             ->select([
    //                 'evt_id',
    //                 DB::raw('MIN(ticket_price) as ticket_price'),
    //                 DB::raw('SUM(ticket_in_stock) as ticket_in_stock'),
    //             ])
    //             ->groupBy('evt_id'),
    //         'ticket_data',
    //         'events.evt_id',
    //         '=',
    //         'ticket_data.evt_id'
    //     )
    //     ->join('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
    //     ->join('orders', 'event_tickets.ticket_id', '=', 'orders.ticket_id')
    //     ->groupBy([
    //         'events.evt_id',
    //         'events.evt_name',
    //         'events.evt_start_date',
    //         'events.evt_address',
    //         'events.evt_status',
    //         'ticket_data.ticket_price',
    //         'ticket_data.ticket_in_stock',
    //     ])
    //     ->orderByDesc('total_quantity_sold')
    //     ->paginate(9);

    //     if($popularEvent->isEmpty()){
    //         return response()->json([
    //             'message' => 'No event found'
    //         ], 404);
    //     }

    //     return response()->json([
    //         'data'=> $popularEvent
    //     ],200);

    // }
    public function concert(){
        return $this->eventService->concert();
    }

    public function conferences(){
        return $this->eventService->conferences();
    }

    public function sports(){
        return $this->eventService->sport();
    }
}