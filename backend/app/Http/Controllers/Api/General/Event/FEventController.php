<?php

namespace App\Http\Controllers\Api\General\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FEventController extends Controller
{
    public function allevent(){
        $event = DB::table('events')
        ->select(
                'events.evt_id',
                'events.evt_name',
                'events.evt_start_date',
                'events.evt_address',
                'events.evt_status',
                'event_tickets.ticket_id',
                'event_tickets.ticket_title',
                'event_tickets.ticket_price',
                'event_tickets.ticket_in_stock'
                )
        ->rightJoin('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        ->where('events.evt_status', '=', '1')
        ->get();
        return response()->json([
                'data' => $event
            ],200);

    }
     public function eventcoming(){
        $event = DB::table('event_tickets')
        ->select('event_tickets.ticket_id',
                'event_tickets.ticket_title',
                'event_tickets.ticket_price',
                'event_tickets.ticket_in_stock',
                'events.evt_name',
                'events.evt_start_date',
                'events.evt_address')
        ->leftJoin('events', 'event_tickets.evt_id', '=', 'events.evt_id')
        ->where('events.evt_start_date', '>', now())
        ->get();

        return response()->json([
                'data' => $event
        ],200);

    }
    public function mostpopular(){
        $eventPopular=DB::table('events')
        ->select('*')
        ->get();

        return response()->json([
            'data'=> $eventPopular
        ],200);

    }
    public function concert(){
       $eventConcert = DB::table('events')
        ->select(
                'events.evt_id',
                'events.evt_name',
                'events.evt_start_date',
                'events.evt_address',
                'events.evt_status',
                'event_tickets.ticket_id',
                'event_tickets.ticket_title',
                'event_tickets.ticket_price',
                'event_tickets.ticket_in_stock'
                )
        ->rightJoin('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        ->where('events.evt_status', '=', '1')
        ->where('cate_id', '=', '1')
        ->get();
        return response()->json([
            'data'=> $eventConcert
        ],200);

    }
    public function conferences(){
        $eventConferences = DB::table('events')
        ->select(
                'events.evt_id',
                'events.evt_name',
                'events.evt_start_date',
                'events.evt_address',
                'events.evt_status',
                'event_tickets.ticket_id',
                'event_tickets.ticket_title',
                'event_tickets.ticket_price',
                'event_tickets.ticket_in_stock'
                )
        ->rightJoin('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        ->where('events.evt_status', '=', '1')
        ->where('cate_id', '=', '3')
        ->get();
        return response()->json([
            'data'=> $eventConferences
        ],200);

    }
    public function sport(){
        $eventSport = DB::table('events')
        ->select(
                'events.evt_id',
                'events.evt_name',
                'events.evt_start_date',
                'events.evt_address',
                'events.evt_status',
                'event_tickets.ticket_id',
                'event_tickets.ticket_title',
                'event_tickets.ticket_price',
                'event_tickets.ticket_in_stock'
                )
        ->rightJoin('event_tickets', 'events.evt_id', '=', 'event_tickets.evt_id')
        ->where('events.evt_status', '=', '1')
        ->where('cate_id', '=', '4')
        ->get();
        return response()->json([
            'data'=> $eventSport
        ],200);
    }
}
