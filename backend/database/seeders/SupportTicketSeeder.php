<?php

namespace Database\Seeders;

use App\Models\SupportTicket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SupportTicket::create([
            'message_subject' => 'Test Msg Subject',
            'message' => 'Test Msg Content',
            'status' => 1,
            'user_id' => 3
        ]);
    }
}
