<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Event::create([
        //     'evt_name' => 'Diddy Party',
        //     'evt_description' => 'ABC',
        //     'evt_policy' => '18+',
        //     'evt_start_date' => Carbon::now(),
        //     'evt_end_date' => Carbon::now(),
        //     'evt_address' => 'abc',
        //     'evt_address_link' => 'https://maps.app.goo.gl/RmLLd97uGT7TPG9T6',
        //     'status' => 1,
        //     'evt_status' => 1,
        //     'cate_id' => 1,
        //     'partnership_id' => 1
        // ]);

        Event::factory()->count(5)->create();
    }
}
