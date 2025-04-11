<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use App\Models\User;
use Filament\Forms\Components\Section;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Users', User::where('role_id', config("roles.user"))->count())
                ->description('Total registered users in the system')
                ->color('primary')
                ->icon('heroicon-m-user-group')
                ->chart([800, 400, 500, 700, 800]),

            Stat::make('Event Providers', User::where('role_id', config("roles.event-provider"))->count())
                ->description('Total event providers')
                ->color('success')
                ->icon('heroicon-m-briefcase')
                ->chart([1000, 400, 500, 400, 3000]),

            Stat::make('Total Events', Event::count())
                ->description('Events currently available')
                ->color('warning')
                ->icon('heroicon-m-calendar-days')
                ->chart([800, 400, 500, 700, 800]),

        ];
    }
}
