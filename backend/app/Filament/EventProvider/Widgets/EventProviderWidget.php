<?php

namespace App\Filament\EventProvider\Widgets;

use App\Models\Event;
use App\Models\Order;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EventProviderWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Order', Order::count())
                ->description('Total Orders')
                ->color('primary')
                ->icon('heroicon-o-shopping-cart')
                ->chart([800, 400, 500, 700, 800]),

            Stat::make('Total Ticket', User::where('role_id', config("roles.event-provider"))->count())
                ->description('Total Ticket')
                ->color('success')
                ->icon('heroicon-o-ticket')
                ->chart([1000, 400, 500, 400, 3000]),

            Stat::make('Total Events', Event::where('partnership_id', auth()->user()->partnership_id)->count())
                ->description('Total Events')
                ->color('warning')
                ->icon('heroicon-o-calendar')
                ->chart([800, 400, 500, 700, 800]),
        ];
    }
}
