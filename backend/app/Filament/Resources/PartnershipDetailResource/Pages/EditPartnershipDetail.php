<?php

namespace App\Filament\Resources\PartnershipDetailResource\Pages;

use App\Filament\Resources\PartnershipDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartnershipDetail extends EditRecord
{
    protected static string $resource = PartnershipDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
