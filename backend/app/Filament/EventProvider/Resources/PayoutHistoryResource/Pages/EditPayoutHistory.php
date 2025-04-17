<?php

namespace App\Filament\EventProvider\Resources\PayoutHistoryResource\Pages;

use App\Filament\EventProvider\Resources\PayoutHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPayoutHistory extends EditRecord
{
    protected static string $resource = PayoutHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
