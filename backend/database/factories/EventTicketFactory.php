<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\EventTicket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventTicket>
 */
class EventTicketFactory extends Factory
{
    protected $model = EventTicket::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Fetch a random evt_id from existing events
        $event = Event::inRandomOrder()->first();

        return [
            'ticket_title' => ['Normal Ticket', 'VIP Ticket', 'VVIP Ticket', 'Not Normal Ticket'][rand(0, 3)],
            'ticket_price' => $this->faker->randomElement([
                10,
                20,
                30,
                40,
                50,
                60,
                70,
                80,
                90,
                100
            ]),
            'ticket_in_stock' => $this->faker->randomElement([
                955,
                1000,
                1500,
                2000,
                2500,
                3000,
                3500,
                4000,
                4500,
                5000
            ]),
            'ticket_description' => 'ABC',
            'ticket_expiry_date' => Carbon::now(),
            'evt_id' => $event ? $event->evt_id : 1, // Fallback to 1 if no events exist
            'ticket_status' => "1"
        ];
    }
}
