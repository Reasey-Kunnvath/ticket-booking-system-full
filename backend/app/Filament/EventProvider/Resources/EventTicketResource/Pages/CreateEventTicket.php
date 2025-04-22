<?php

namespace App\Filament\EventProvider\Resources\EventTicketResource\Pages;

use App\Filament\EventProvider\Resources\EventTicketResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEventTicket extends CreateRecord
{
    protected static string $resource = EventTicketResource::class;
}
