<?php

namespace App\Filament\EventProvider\Resources;

use App\Filament\EventProvider\Resources\SupportCenterResource\Pages;
use App\Filament\EventProvider\Resources\SupportCenterResource\RelationManagers;
use App\Models\SupportCenter;
use App\Models\SupportTicket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupportCenterResource extends Resource
{
    protected static ?string $model = SupportTicket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make("user.name")->label("From"),
                TextColumn::make("message_subject")
                    ->label('Subject')
                    ->searchable(),
                TextColumn::make("message")
                    ->label('Message')
                    ->limit(50)
                    ->searchable(),
                TextColumn::make("status")
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'danger',
                        '1' => 'success',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        '0' => 'Inactive',
                        '1' => 'Active',
                    }),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make()->modal(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSupportCenters::route('/'),
            'create' => Pages\CreateSupportCenter::route('/create'),
            'edit' => Pages\EditSupportCenter::route('/{record}/edit'),
        ];
    }
}
