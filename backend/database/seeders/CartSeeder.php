<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cart::create([
            'user_id' => 3,
            'event_id' => 1,
            'ticket_id' => 25,
            'QTY' => 5,
            'total_price' => 50,
        ]);

        Cart::create([
            'user_id' => 3,
            'event_id' => 1,
            'ticket_id' => 19,
            'QTY' => 2,
            'total_price' => 120,
        ]);
    }
}
