<?php

namespace App\Filament\Resources\PartnershipDetailResource\Pages;

use App\Filament\Resources\PartnershipDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartnershipDetails extends ListRecords
{
    protected static string $resource = PartnershipDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
