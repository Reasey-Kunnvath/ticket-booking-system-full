<?php
namespace App\Services;

use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventService
{
    public function allevent(){
        $event = Event::select([
            'events.evt_id',
            'events.evt_name',
            'events.evt_start_date',
            'events.evt_address',
            'events.evt_status',
            'event_categories.cate_name',
            DB::raw('MIN(event_tickets.ticket_price) as ticket_price'),
            DB::raw('SUM(event_tickets.ticket_in_stock) as ticket_in_stock'),
            DB::raw('COALESCE(SUM(order_details.QTY), 0) as total_tickets_sold'), // Use COALESCE to return 0 if no tickets sold
        ])
        ->join('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        ->join('event_categories', 'events.cate_id', '=', 'event_categories.cate_id')
        ->leftJoin('order_details', 'event_tickets.ticket_id', '=', 'order_details.ticket_id') // Left join to include events with 0 sales
        ->where('events.evt_status', '1')
        ->orderBy('total_tickets_sold', 'desc')
        ->groupBy([
            'events.evt_id',
            'events.evt_name',
            'events.evt_start_date',
            'events.evt_address',
            'events.evt_status',
        ])
        ->paginate(9);

        return response()->json([
            'data' => $event
        ],200);
    }

    public function eventcoming(){
        $event = Event::select([
            'events.evt_id',
            'events.evt_name',
            'events.evt_start_date',
            'events.evt_address',
            'events.evt_status',
            'event_categories.cate_name',
            DB::raw('MIN(event_tickets.ticket_price) as ticket_price'),
            DB::raw('SUM(event_tickets.ticket_in_stock) as ticket_in_stock'),
            DB::raw('COALESCE(SUM(order_details.QTY), 0) as total_tickets_sold'),
        ])
        ->join('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        ->join('event_categories', 'events.cate_id', '=', 'event_categories.cate_id')
        ->leftJoin('order_details', 'event_tickets.ticket_id', '=', 'order_details.ticket_id')
        ->where('events.evt_start_date', '>', now())
        ->groupBy([
            'events.evt_id',
            'events.evt_name',
            'events.evt_start_date',
            'events.evt_address',
            'events.evt_status',
        ])
        ->orderBy('total_tickets_sold', 'desc') // Order by event start date
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
                'event_categories.cate_name',
                DB::raw('SUM(order_details.QTY) as total_quantity_sold'),
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
            ->join('order_details', 'event_tickets.ticket_id', '=', 'order_details.ticket_id')
            ->join('event_categories', 'events.cate_id', '=', 'event_categories.cate_id')
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
        $eventConcert = Event::select([
            'events.evt_id',
            'events.evt_name',
            'events.evt_start_date',
            'events.evt_address',
            'events.evt_status',
            'event_categories.cate_name',
            DB::raw('MIN(event_tickets.ticket_price) as ticket_price'),
            DB::raw('SUM(event_tickets.ticket_in_stock) as ticket_in_stock'),
            DB::raw('COALESCE(SUM(order_details.QTY), 0) as total_tickets_sold'),
        ])
        ->join('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        ->join('event_categories', 'events.cate_id', '=', 'event_categories.cate_id')
        ->leftJoin('order_details', 'event_tickets.ticket_id', '=', 'order_details.ticket_id')
        ->where('events.evt_status', '1')
        ->where('events.cate_id', '=', '1')
        ->groupBy([
            'events.evt_id',
            'events.evt_name',
            'events.evt_start_date',
            'events.evt_address',
            'events.evt_status',
        ])
        ->orderBy('total_tickets_sold', 'desc')
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
            'event_categories.cate_name',
            DB::raw('MIN(event_tickets.ticket_price) as ticket_price'),
            DB::raw('SUM(event_tickets.ticket_in_stock) as ticket_in_stock'),
            DB::raw('COALESCE(SUM(order_details.QTY), 0) as total_tickets_sold'),
        ])
        ->join('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        ->join('event_categories', 'events.cate_id', '=', 'event_categories.cate_id')
        ->leftJoin('order_details', 'event_tickets.ticket_id', '=', 'order_details.ticket_id')
        ->where('events.evt_status', '1')
        ->where('events.cate_id', '=', '2')
        ->groupBy([
            'events.evt_id',
            'events.evt_name',
            'events.evt_start_date',
            'events.evt_address',
            'events.evt_status',
        ])
        ->orderBy('total_tickets_sold', 'desc')
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
            'event_categories.cate_name',
            DB::raw('MIN(event_tickets.ticket_price) as ticket_price'),
            DB::raw('SUM(event_tickets.ticket_in_stock) as ticket_in_stock'),
            DB::raw('COALESCE(SUM(order_details.QTY), 0) as total_tickets_sold'),
        ])
        ->join('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        ->join('event_categories', 'events.cate_id', '=', 'event_categories.cate_id')
        ->leftJoin('order_details', 'event_tickets.ticket_id', '=', 'order_details.ticket_id')
        ->where('events.evt_status', '1')
        ->where('events.cate_id', '=', '3')
        ->groupBy([
            'events.evt_id',
            'events.evt_name',
            'events.evt_start_date',
            'events.evt_address',
            'events.evt_status',
        ])
        ->orderBy('total_tickets_sold', 'desc')
        ->paginate(9);

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
