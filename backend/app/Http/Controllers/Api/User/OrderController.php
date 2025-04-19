<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // $order = Order::with('ticket')->where('user_id', $request->query('user_id'))->get();
        $order = DB::table('orders as o')
                    ->select(
                        'u.id',
                        'u.name',
                        'u.email',
                        'o.order_id',
                        'e.evt_name',
                        'et.ticket_title',
                        'et.ticket_price',
                        'od.QTY',
                        DB::raw('(od.QTY * et.ticket_price) AS total_amount'),
                        'o.created_at',
                        'os.status_name',
                        'os.status_color'
                    )
                    ->join('users as u', 'o.user_id', '=', 'u.id')
                    ->join('orderstatus as os', 'o.status_id', '=', 'os.status_id')
                    ->join('order_details as od', 'od.order_id', '=', 'o.order_id')
                    ->join('events as e', 'od.evt_id', '=', 'e.evt_id')
                    ->join('event_tickets as et', 'od.ticket_id', '=', 'et.ticket_id')
                    ->where('o.user_id', $request->query('user_id'))
                    ->get();
        if(!$order) {
            return response()->json([
                'status' => 0,
                'message' => 'Order Not Found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'status' => 1,
            'data' => $order,
        ]);
    }
}