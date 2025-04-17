<?php

namespace App\Filament\EventProvider\Resources\EventResource\Pages;

use App\Filament\EventProvider\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;
}
