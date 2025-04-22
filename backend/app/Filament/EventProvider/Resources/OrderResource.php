<?php

namespace App\Filament\EventProvider\Resources;

use App\Filament\EventProvider\Resources\OrderResource\Pages;
use App\Filament\EventProvider\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

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
            ->query(
                Order::query()
                    ->select([
                        'orders.order_id',
                        'users.id as user_id',
                        'users.name as username',
                        'event_tickets.ticket_title',
                        'order_details.QTY',
                        'event_tickets.ticket_price',
                        'orders.total_amount',
                        'orderstatus.status_name',
                        'orderstatus.status_color',
                        'events.partnership_id',
                        'events.evt_name',
                        'event_providers.name as event_provider',
                        'event_providers.id as event_provider_id',
                        'orders.created_at',
                    ])
                    ->join('users', 'users.id', '=', 'orders.user_id')
                    ->join('order_details', 'orders.order_id', '=', 'order_details.order_id')
                    ->join('event_tickets', 'event_tickets.ticket_id', '=', 'order_details.ticket_id')
                    ->join('orderstatus', 'orders.status_id', '=', 'orderstatus.status_id')
                    ->join('events', 'events.evt_id', '=', 'event_tickets.evt_id')
                    ->join('users as event_providers', 'event_providers.partnership_id', '=', 'events.partnership_id')
                    ->where('events.partnership_id', auth()->user()->partnership_id)
            )
            ->columns([
                TextColumn::make("evt_name")
                    ->label("Event")
                    ->searchable(),
                TextColumn::make("ticket_title")
                    ->label("Ticket")
                    ->searchable(),
                TextColumn::make("ticket_price")
                    ->label("Unit Price")
                    ->money('USD'),
                TextColumn::make("QTY")
                    ->label("Quantity")
                    ->suffix(' Tickets')
                    ->sortable(),
                TextColumn::make("total_amount")
                    ->label("Total Amount")
                    ->money('USD')
                    ->sortable(),
                TextColumn::make("status_name")
                    ->label("Status")
                    ->badge()
                    ->color(function ($record) {
                        if ($record->status_name == "complete") {
                            return "success";
                        } else if ($record->status_name == "processing") {
                            return "warning";
                        } else {
                            return "danger";
                        }
                    }),
                TextColumn::make("created_at")
                    ->label("Order Date")
                    ->dateTime('M d, Y h:i A'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->relationship('status', 'status_name')
                    ->label('Order Status'),
                SelectFilter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Order Date (from)'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Order Date (to)'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date)
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date)
                            );
                    })
                    ->label('Order Date'),
            ]);
        // ->actions([
        //     Tables\Actions\DeleteAction::make(),
        // ])
        // ->bulkActions([
        //     Tables\Actions\BulkActionGroup::make([
        //         Tables\Actions\DeleteBulkAction::make(),
        //     ]),
        // ]);
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
            'index' => Pages\ListOrders::route('/'),
            // 'create' => Pages\CreateOrder::route('/create'),
            // 'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
