<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index(Request $request)
    {
        // $cart = Cart::where('user_id', $request->query('user_id'))->get();

        $cart = Cart::select(
            'carts.id AS cart_id',
            'users.id AS user_id',
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

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required|exists:users,id',
            'items' => 'required|array',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->messages(),
            ], 404);
        }

        $updatedItems = collect($request->items)->keyBy('cart_id');
        $cartItems = Cart::where('user_id', $request->user_id)
            ->join('event_tickets', 'carts.ticket_id', '=', 'event_tickets.ticket_id')
            ->join('events', 'event_tickets.evt_id', '=', 'events.evt_id')
            ->get();


        foreach ($updatedItems as $Item) {
            DB::table('carts')
                ->where('id', $Item['cart_id'])
                ->update([
                    'QTY' => $Item['QTY'],
                    'total_price' => $Item['QTY'] * $Item['ticket_price'],
                ]);
        }


        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully',
        ]);
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json([
                'status' => false,
                'message' => 'Item not found',
            ], 404);
        }

        $cart->delete();

        return response()->json([
            'status' => true,
            'message' => 'Cart deleted successfully ' . $id,
        ]);
    }
}
