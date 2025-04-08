<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\EventTicket;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // EventTicket::create([
        //     'ticket_title' => 'Normal Ticket',
        //     'ticket_price' => '10',
        //     'ticket_in_stock' => '1000',
        //     'ticket_description' => 'ABC',
        //     'ticket_expiry_date' => Carbon::now(),
        //     'evt_id' => 1
        // ]);

        // EventTicket::create([
        //     'ticket_title' => 'Not Normal Ticket',
        //     'ticket_price' => '100',
        //     'ticket_in_stock' => '1000',
        //     'ticket_description' => 'ABC',
        //     'ticket_expiry_date' => Carbon::now(),
        //     'evt_id' => 2
        // ]);

        EventTicket::factory()->count(50)->create();
    }
}
