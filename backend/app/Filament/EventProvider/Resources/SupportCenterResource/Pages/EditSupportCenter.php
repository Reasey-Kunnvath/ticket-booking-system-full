<?php

namespace App\Filament\EventProvider\Resources\SupportCenterResource\Pages;

use App\Filament\EventProvider\Resources\SupportCenterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSupportCenter extends EditRecord
{
    protected static string $resource = SupportCenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
