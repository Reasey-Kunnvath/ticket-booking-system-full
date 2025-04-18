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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventTicketResource extends Resource
{
    protected static ?string $model = EventTicket::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationGroup = 'Event Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Ticket Information')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Select::make('evt_id')
                                    ->relationship('event', 'evt_name')
                                    ->label("Event")
                                    ->required(),

                                TextInput::make("ticket_title")
                                    ->required()
                                    ->label("Title"),

                                DatePicker::make("ticket_expiry_date")
                                    ->required()
                                    ->label("Expired Date"),

                                TextInput::make("ticket_price")
                                    ->numeric()
                                    ->required()
                                    ->label("Price"),

                                TextInput::make("ticket_in_stock")
                                    ->numeric()
                                    ->required()
                                    ->label("In Stock"),
                            ]),

                        Textarea::make("ticket_description")
                            ->label("Description")
                            ->rows(5),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make("ticket_title")
                    ->label("Title")
                    ->searchable()
                    ->sortable(),

                TextColumn::make("ticket_price")
                    ->label("Price")
                    ->sortable(),

                TextColumn::make("ticket_in_stock")
                    ->label("In Stock")
                    ->sortable(),

                TextColumn::make("event.evt_name")
                    ->label("Event")
                    ->sortable()
                    ->searchable(),

                TextColumn::make("ticket_expiry_date")
                    ->label("Expired Date")
                    ->date(), // <- Format as date nicely

                TextColumn::make("ticket_description")
                    ->label("Description")
                    ->limit(30),
            ])
            ->filters([
                SelectFilter::make('evt_id')
                    ->relationship("event", "evt_name")
                    ->label("Event"),

                Tables\Filters\Filter::make('ticket_expiry_date')
                    ->form([
                        DatePicker::make('ticket_expiry_date_from')
                            ->label('Expired Date From'),

                        DatePicker::make('ticket_expiry_date_until')
                            ->label('Expired Date Until'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['ticket_expiry_date_from'], fn($q, $date) => $q->whereDate('ticket_expiry_date', '>=', $date))
                            ->when($data['ticket_expiry_date_until'], fn($q, $date) => $q->whereDate('ticket_expiry_date', '<=', $date));
                    }),
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
