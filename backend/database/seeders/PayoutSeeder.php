<?php

namespace Database\Seeders;

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
        Payout::create([
            'total_sales' => 9000,
            'platform_commission' => 9000 / 100 * 0.35,
            'net_payout' => 8000,
            'currency' => 'USD',
            'payout_date' => Carbon::now(),
            'ref_number' => '#REF00123',
            'notes' => 'ABC',
            'evt_provider_id' => 1,
            'evt_id' => 1,
            'payout_status_id' => 1,
            'method_id' => 1
        ]);
    }
}
