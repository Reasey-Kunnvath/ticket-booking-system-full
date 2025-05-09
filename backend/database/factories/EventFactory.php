<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'evt_name' => $this->faker->randomElement([
                'Diddy Party',
                'Tena Concert',
                'Kane VS John Cena',
                'Kane VS Undertaker',
                'Kane VS Triple H',
                'Kanye West Concert',
                'Donald J. Trump Conference',
                'FOMC Minutes'
            ]), // Replaced offensive term
            'evt_description' => 'ABC',
            'evt_policy' => '18+',
            'evt_start_date' => $this->faker->randomElement([
                Carbon::now(),
                Carbon::now()->addWeek(1),
            ]),
            'evt_end_date' => $this->faker->randomElement([
                Carbon::now()->addMonth(1)
            ]), // Default to a 1-month duration
            'evt_address' => 'abc',
            'evt_address_link' => 'https://maps.app.goo.gl/RmLLd97uGT7TPG9T6',
            'status' => '1',
            'evt_status' => '1',
            'cate_id' => $this->faker->randomElement([1, 2, 3]),
            'partnership_id' => 1,
            'image' => 'event-image.png'
        ];
    }
}
