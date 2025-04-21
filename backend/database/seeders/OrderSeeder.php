<?php

namespace Database\Seeders;

use App\Models\Coupons;
use App\Models\EventTicket;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $total = 0;
        // $ticket_qty = 5;
        // $get_ticket_price = EventTicket::where('ticket_id', 1)->first()->ticket_price;
        // $get_coupons = Coupons::where('coupons_id', 1)->first();
        // $original_amount = $ticket_qty * $get_ticket_price;

        // if($get_coupons->coupons_type == 'percentage'){
        //     $discount = $original_amount - ($original_amount * $get_coupons->coupons_value/100);
        //     $total = $original_amount - $discount;
        // }else if($get_coupons->coupons_type == 'amount'){
        //     $total = $original_amount - $get_coupons->coupons_value;
        // }

        Order::create([
            'status_id' => 2,
            'useCoupon' => '1',
            'coupon_id' => 1,
            'total_amount' =>950,
            'user_id' => 2,
            'created_at' => Carbon::now()->subMonth(1),

        ]);

        Order::create([
            'status_id' => 2,
            'useCoupon' => '0',
            'total_amount' => 300,
            'user_id' => 2,
            'created_at' => Carbon::now()->subMonth(1),
        ]);

        Order::create([
            'status_id' => 2,
            'useCoupon' => '0',
            'total_amount' => 1500,
            'user_id' => 2,
            'created_at' => Carbon::now(),
        ]);
    }
}