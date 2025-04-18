<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use App\Models\Payout;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event = Event::first();

        if (!$event) {
            $event = Event::create([
                'evt_name' => 'Default Event',
                'evt_description' => 'Auto-created event for seeding payout.',
                'evt_policy' => 'No refund policy applies.',
                'evt_start_date' => now(),
                'evt_end_date' => now()->addDays(2),
                'evt_address' => 'Phnom Penh, Cambodia',
                'evt_address_link' => 'https://goo.gl/maps/xyz',
                'status' => 1,
                'evt_status' => 1,
                'cate_id' => 1,
                'partnership_id' => 1,
            ]);
        }


        Payout::create([
            'total_sales' => 9000,
            'platform_commission' => 9000 / 100 * 0.35,
            'net_payout' => 8000,
            'currency' => 'USD',
            'payout_date' => Carbon::now(),
            'ref_number' => '#REF00123',
            'notes' => 'ABC',
            'partnership_id' => 1,
            'evt_id' => 1,
            'payout_status_id' => 1,
            'method_id' => 1
        ]);
    }
}
