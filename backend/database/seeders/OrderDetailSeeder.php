<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderDetail::create([
            'evt_id' => 1,
            'ticket_id' => 1,
            'QTY' => 5,
            'ticket_price' => 10,
            'order_id' => 1,
        ]);

        OrderDetail::create([
            'evt_id' => 1,
            'ticket_id' => 2,
            'QTY' => 100,
            'ticket_price' => 10,
            'order_id' => 1,
        ]);

        OrderDetail::create([
            'evt_id' => 2,
            'ticket_id' => 2,
            'QTY' => 20,
            'ticket_price' => 15,
            'order_id' => 2,
        ]);

        OrderDetail::create([
            'evt_id' => 3,
            'ticket_id' => 3,
            'QTY' => 300,
            'ticket_price' => 5,
            'order_id' => 3,
        ]);
    }
}
