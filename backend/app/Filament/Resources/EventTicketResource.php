<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventTicketResource\Pages;
use App\Filament\Resources\EventTicketResource\RelationManagers;
use App\Models\EventTicket;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventTicketResource extends Resource
{
    protected static ?string $model = EventTicket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Event Management';




    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('evt_id')
                    ->relationship('event', 'evt_name')
                    ->required(),
                TextInput::make("ticket_title")->required()->label("Title"),
                DatePicker::make("ticket_expiry_date")->required()->label("Expired Date"),
                TextInput::make("ticket_price")->required()->label("Price")->integer(),
                TextInput::make("ticket_in_stock")->required()->label("In Stock")->integer(),
                Textarea::make("ticket_description")->label("Description"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make("ticket_title")->label("Title"),
                TextColumn::make("ticket_price")->label("Price"),
                TextColumn::make("ticket_in_stock")->label("Instock"),
                TextColumn::make("event.evt_name")->label("Event"),
                TextColumn::make("ticket_expiry_date")->label("Expired Date"),
                TextColumn::make("ticket_description")->label("Description")
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->modal(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListEventTickets::route('/'),
            // 'create' => Pages\CreateEventTicket::route('/create'),
            // 'edit' => Pages\EditEventTicket::route('/{record}/edit'),
        ];
    }
}
