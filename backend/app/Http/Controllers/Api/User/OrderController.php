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
        $order = DB::table('users as u')
            ->select(
                'u.id',
                'u.name',
                'u.email',
                'o.order_id',
                'et.ticket_title',
                'e.evt_name',
                'o.QTY',
                'et.ticket_price',
                'o.total_amount',
                'o.created_at',
                'os.status_name',
                'os.status_color',
            )
            ->join('orders as o', 'u.id', '=', 'o.user_id')
            ->join('orderstatus as os', 'os.status_id', '=', 'o.status_id')
            ->join('event_tickets as et', 'et.ticket_id', '=', 'o.ticket_id')
            ->join('events as e', 'e.evt_id', '=', 'et.evt_id')
            ->where('u.id', $request->query('user_id'))
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
