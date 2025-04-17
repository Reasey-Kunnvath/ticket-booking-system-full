<?php

namespace App\Filament\EventProvider\Resources\PayoutHistoryResource\Pages;

use App\Filament\EventProvider\Resources\PayoutHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePayoutHistory extends CreateRecord
{
    protected static string $resource = PayoutHistoryResource::class;
}
