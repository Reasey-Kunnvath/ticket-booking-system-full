<?php

namespace App\Filament\EventProvider\Resources;

use App\Filament\EventProvider\Resources\EventTicketResource\Pages;
use App\Filament\EventProvider\Resources\EventTicketResource\RelationManagers;
use App\Models\Event;
use App\Models\EventTicket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\Action;

class EventTicketResource extends Resource
{
    protected static ?string $model = EventTicket::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Ticket Information')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Select::make('evt_id')
                                    ->options(Event::where('partnership_id', auth()->user()->partnership_id)->pluck('evt_name', 'evt_id'))

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
        return $table
            ->query(
                EventTicket::query()
                    ->select([
                                'event_tickets.ticket_id',
                                'event_tickets.ticket_title',
                                'event_tickets.ticket_price',
                                'event_tickets.ticket_status',
                                'event_tickets.ticket_in_stock',
                                'events.evt_name',
                                'event_tickets.ticket_expiry_date',
                                'event_tickets.ticket_description',
                                'partnership_details.partnership_id',
                            ])
                            ->join('events', 'event_tickets.evt_id', '=', 'events.evt_id')
                            ->join('partnership_details', 'events.partnership_id', '=', 'partnership_details.partnership_id')
                            ->join('users', 'partnership_details.partnership_id', '=', 'users.partnership_id')
                            ->where('partnership_details.partnership_id', auth()->user()->partnership_id)

            )
            ->columns([
                TextColumn::make("ticket_title")
                    ->label("Title")
                    ->searchable()
                    ->sortable(),

                TextColumn::make("ticket_price")
                    ->label("Price")
                    ->sortable(),

                TextColumn::make('ticket_status')
                    ->label("Ticket Status")
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        '0' => 'Rejected',
                        '1' => 'Approved',
                        '2' => 'Pending',
                    })
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'danger',
                        '1' => 'success',
                        '2' => 'warning',
                    }),

                TextColumn::make("ticket_in_stock")
                    ->label("In Stock")
                    ->sortable(),

                TextColumn::make("evt_name")
                    ->label("Event")
                    ->sortable()
                    ->searchable(),

                TextColumn::make("ticket_expiry_date")
                    ->label("Expired Date")
                    ->date(),

                TextColumn::make("ticket_description")
                    ->label("Description")
                    ->limit(30),
            ])
            ->filters([
                SelectFilter::make('evt_id')
                    ->relationship("event", "evt_name")
                    ->label("Event")
                    ->searchable(),

                Tables\Filters\Filter::make('ticket_expiry_date')
                    ->form([
                        DatePicker::make('ticket_expiry_date_from')
                            ->label('Expired Date From'),
                        DatePicker::make('ticket_expiry_date_until')
                            ->label('Expired Date Until'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['ticket_expiry_date_from'], fn($q, $date) => $q->whereDate('event_tickets.ticket_expiry_date', '>=', $date))
                            ->when($data['ticket_expiry_date_until'], fn($q, $date) => $q->whereDate('event_tickets.ticket_expiry_date', '<=', $date));
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->modal()->color('primary'),
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