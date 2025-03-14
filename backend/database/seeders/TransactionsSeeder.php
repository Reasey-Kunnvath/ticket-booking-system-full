<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Transactions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'order_id' => $get_orders->order_id,
            'method_id' => 2,
            'status_id' => 2,
        ]);
    }
}
