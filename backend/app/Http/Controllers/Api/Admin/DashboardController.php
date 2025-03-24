<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = Transactions::all();
        $salesCount = $transactions->count();
        $totalUserCount = User::count();
        $totalSupportMessageCount = SupportTicket::count();
        $orderUser = Order::with('user')->get();

        $transValues = Transactions::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(amount) as total_amount')
        )
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->orderBy(DB::raw('MONTH(created_at)'))
        ->get();


        $months = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun',
            7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
        ];

        $chartData = [];
        for($month = 1; $month <= 12; $month++) {
            $chartData[] = [
                'name' => $months[$month],
                'total' => 0,
                'predicted' => rand(0, max($transValues->pluck('total_amount')->toArray())),
            ];
        }


        foreach ($transValues as $transValue) {
            $monthNumber = $transValue->month;
            $chartData[$monthNumber - 1]['total'] = $transValue->total_amount;
        }

        if ($salesCount === 0) {
            return response()->json([
                'message' => 'No transaction found',
            ], 200);
        }

        $totalRevenue = $transactions->sum('amount');

        return response()->json([
            'success' => true,
            'data' => $transactions,
            'meta' => [
                'totalRevenue' => $totalRevenue,
                'salesCount' => $salesCount,
                'totalUserCount' => $totalUserCount,
                'totalSupportMessageCount' => $totalSupportMessageCount,
                'userOrder' => $orderUser,
                'chartComponents' => [
                    'data' => $chartData,
                ]
            ],
        ], 200);
    }

    public function store(Request $request){

    }

    public function show(Request $request){

    }

    public function update(){

    }

    public function destroy(){

    }
}
