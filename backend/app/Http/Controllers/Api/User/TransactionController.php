<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'use_Coupon' => 'required',
            'coupon_id' => 'required',
            'total_amount' => 'required',
            'user_id' => 'required',
            'items' => 'required|array',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'All Fields are required',
                'error' => $validator->messages(),
            ],422);
        }

        $order = Order::create([
            'status_id' => 2,
            'useCoupon' => $request->use_Coupon,
            'coupon_id' => $request->coupon_id,
            'total_amount' => $request->total_amount,
            'user_id' => $request->user_id,
        ]);

        $orderItems = collect($request->items)->map(function ($item) use ($order) {
            return [
                'order_id' => $order->order_id,
                'evt_id' => $item['evt_id'],
                'ticket_id' => $item['ticket_id'],
                'QTY' => $item['QTY'],
                'ticket_price' => $item['ticket_price'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });

        $orderDetails = DB::table('order_details')->insert($orderItems->toArray());

        $transactions = Transactions::create([
            'amount' => $request->total_amount,
            'currency' => 'USD',
            'order_id' => $order->order_id,
            'method_id' => 2,
            'status_id' => 2
        ]);

        $cart = Cart::where('user_id', $request->user_id)->delete();

        $items = $request->input('items');

        foreach ($items as $item) {
            DB::table('event_tickets')
                ->where('ticket_id', $item['ticket_id'])
                ->decrement('ticket_in_stock', $item['QTY']);
        }

        return response()->json([
            'success' => true,
            'message' => 'Order Created Successfully',
            'data' => [
                'order' => $order,
                'order_details' => $orderDetails,
                'transaction' => $transactions
            ],
        ]);


    }
}
