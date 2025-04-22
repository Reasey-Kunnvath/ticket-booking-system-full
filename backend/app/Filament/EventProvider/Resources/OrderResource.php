<?php

namespace App\Filament\EventProvider\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\EventProvider\Resources\OrderResource\Pages;
use App\Filament\EventProvider\Resources\OrderResource\RelationManagers;
use App\Models\OrderDetail;

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
                OrderDetail::query()
                    ->select([
                        'order_details.id',
                        'order_details.order_id',
                        'order_details.ticket_id',
                        'order_details.QTY',
                        'order_details.created_at',
                    ])
                    ->with([
                        'order:id,status_id',
                        'order.status:id,status_name',
                        'ticket:id,evt_id,ticket_title,ticket_price',
                        'ticket.event:id,partnership_id,evt_name',
                    ])
                    ->whereHas('ticket.event', function ($query) {
                        $query->where('partnership_id', auth()->user()->partnership_id);
                    })
            )
            ->columns([
                TextColumn::make("order_id")
                    ->label("Order ID"),
                TextColumn::make("ticket.event.evt_name")
                    ->label("Event")
                    ->searchable(),

                TextColumn::make("ticket.ticket_title")
                    ->label("Ticket")
                    ->searchable(),

                TextColumn::make("ticket.ticket_price")
                    ->label("Unit Price")
                    ->money('USD'),

                TextColumn::make("QTY")
                    ->label("Quantity")
                    ->suffix(' Tickets')
                    ->sortable(),

                TextColumn::make("total_amount")
                    ->label("Total Amount")
                    ->state(function ($record) {
                        return $record->QTY * $record->ticket->ticket_price;
                    })
                    ->money('USD')
                    ->sortable(),

                TextColumn::make("order.status.status_name")
                    ->label("Status")
                    ->badge()
                    ->color(function ($record) {
                        $status = $record->order->status->status_name ?? '';
                        return match ($status) {
                            'complete' => 'success',
                            'processing' => 'warning',
                            default => 'danger',
                        };
                    }),

                TextColumn::make("created_at")
                    ->label("Order Date")
                    ->dateTime('M d, Y h:i A'),
            ])
            ->filters([
                // SelectFilter::make('status')
                //     ->relationship('status', 'status_name')
                //     ->label('Order Status'),
                // SelectFilter::make('created_at')
                //     ->form([
                //         Forms\Components\DatePicker::make('created_from')
                //             ->label('Order Date (from)'),
                //         Forms\Components\DatePicker::make('created_until')
                //             ->label('Order Date (to)'),
                //     ])
                //     ->query(function (Builder $query, array $data): Builder {
                //         return $query
                //             ->when(
                //                 $data['created_from'],
                //                 fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date)
                //             )
                //             ->when(
                //                 $data['created_until'],
                //                 fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date)
                //             );
                //     })
                //     ->label('Order Date'),
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
