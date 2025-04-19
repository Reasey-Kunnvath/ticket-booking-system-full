<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Transactions;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $get_orders = Order::where('order_id',1)->first();

        Transactions::create([
            'amount' => $get_orders->total_amount,
            'currency' => 'USD',
            'created_at' => Carbon::now()->subMonth(2),
            'order_id' => $get_orders->order_id,
            'method_id' => 2,
            'status_id' => 2,
        ]);

        $get_orders1 = Order::where('order_id',2)->first();

        Transactions::create([
            'amount' => $get_orders1->total_amount,
            'currency' => 'USD',
            'created_at' => Carbon::now()->subMonth(1),
            'order_id' => $get_orders1->order_id,
            'method_id' => 2,
            'status_id' => 2,
        ]);

        $get_orders2 = Order::where('order_id',3)->first();

        Transactions::create([
            'amount' => $get_orders2->total_amount,
            'currency' => 'USD',
            'created_at' => Carbon::now(),
            'order_id' => $get_orders2->order_id,
            'method_id' => 2,
            'status_id' => 2,
        ]);
    }
}