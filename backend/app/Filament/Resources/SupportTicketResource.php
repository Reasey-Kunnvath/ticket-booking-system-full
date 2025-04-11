<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupportTicketResource\Pages;
use App\Filament\Resources\SupportTicketResource\RelationManagers;
use App\Models\SupportTicket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupportTicketResource extends Resource
{
    protected static ?string $model = SupportTicket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Support Center';




    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSupportTickets::route('/'),
            // 'create' => Pages\CreateSupportTicket::route('/create'),
            // 'edit' => Pages\EditSupportTicket::route('/{record}/edit'),
        ];
    }
}
