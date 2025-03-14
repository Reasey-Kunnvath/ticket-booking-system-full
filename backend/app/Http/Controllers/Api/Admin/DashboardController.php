<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TransactionResource;
use App\Http\Resources\Admin\TransactionCollection;
use App\Models\SupportTicket;

class DashboardController extends Controller
{
    public function index(){
        $transactions = Transactions::get();
        $sales_count = Transactions::count();
        $total_user = User::count();
        $total_supportmsg = SupportTicket::count();

        if($transactions->count() < 0){
            return response()->json([
                'message' => 'No transaction found'
            ],200);
        }

        $total_revenue = $transactions->sum('amount');

        return response()->json([
            'success' => true,
            'data' => $transactions,
            'meta' => [
                'total_revenue' => $total_revenue,
                'sales_count' => $sales_count,
                'total_users' => $total_user,
                'total_support_msg' => $total_supportmsg
            ]
        ],200);

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