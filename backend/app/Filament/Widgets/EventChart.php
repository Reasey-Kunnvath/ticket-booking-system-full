<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Event;
use Illuminate\Support\Carbon;

class EventChart extends ChartWidget
{
    protected static ?string $heading = 'Event Growth';
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = "full";
    protected function getData(): array
    {
        $months = collect(range(1, 12))->map(fn($month) => Carbon::create(null, $month)->format('M'));

        $eventCounts = collect(range(1, 12))->map(function ($month) {
            return Event::whereMonth('created_at', $month)->count();
        });

        return [
            'datasets' => [
                [
                    'label' => 'Events Created',
                    'data' => $eventCounts,
                    'backgroundColor' => 'primary',
                ],
            ],
            'labels' => $months,
            'options' => [
                'animation' => [
                    'duration' => 1000,
                    'easing' => 'easeOutQuart',
                ],
            ],
            'height' => 300,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
