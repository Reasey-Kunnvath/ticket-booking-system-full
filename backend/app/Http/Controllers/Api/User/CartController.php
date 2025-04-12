<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        // $cart = Cart::where('user_id', $request->query('user_id'))->get();

        $cart = Cart::select(
            'users.id',
            'events.evt_name',
            'event_tickets.ticket_title',
            'event_tickets.ticket_price',
            'carts.QTY',
            'carts.total_price'
        )
        ->join('users', 'carts.user_id', '=', 'users.id')
        ->join('event_tickets', 'carts.ticket_id', '=', 'event_tickets.ticket_id')
        ->join('events', 'event_tickets.evt_id', '=', 'events.evt_id')
        ->where('users.id', $request->query('user_id'))
        ->get();

        $cartValue = Cart::where('user_id', $request->query('user_id'))->sum('total_price');

        return response()->json([
            'data' => $cart,
            'cartValue' => $cartValue,
        ]);
    }

    public function store(Request $request){

        // Validate the incoming request data
        $validated = $request->validate([
            'user_id' => 'required',
            'evt_id' => 'required',
            'ticket_id' => 'required',
            'ticket_price' => 'required',
        ]);

        // Create the cart entry
        $cart = Cart::create([
            'user_id' => $request->user_id,
            'event_id' => $request->evt_id,
            'ticket_id' => $request->ticket_id,
            'QTY' => 1,
            'total_price' => $request->ticket_price,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Ticket added to cart successfully',
            'data' => $cart,
        ], 201); // 201 Created status code
    }
}
