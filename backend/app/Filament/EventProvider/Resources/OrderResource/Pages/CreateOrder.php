<?php

namespace App\Filament\EventProvider\Resources\OrderResource\Pages;

use App\Filament\EventProvider\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;
}
