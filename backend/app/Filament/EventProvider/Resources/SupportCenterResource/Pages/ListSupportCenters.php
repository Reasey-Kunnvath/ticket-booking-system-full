<?php

namespace App\Filament\EventProvider\Resources\SupportCenterResource\Pages;

use App\Filament\EventProvider\Resources\SupportCenterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSupportCenters extends ListRecords
{
    protected static string $resource = SupportCenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
