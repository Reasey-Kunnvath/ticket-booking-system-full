<?php

namespace App\Filament\EventProvider\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\OrderDetail;
use App\Models\OrderSummaryView;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\EventProvider\Resources\OrderResource\Pages;
use App\Filament\EventProvider\Resources\OrderResource\RelationManagers;

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
        $partnershipId = auth()->user()->partnership_id;

        return $table
        ->query(
            OrderDetail::query()
                ->select([
                    'order_details.order_detail_id',
                    'events.evt_name',
                    'event_tickets.ticket_title',
                    'event_tickets.ticket_price',
                    'order_details.QTY',
                    DB::raw('(order_details.QTY * event_tickets.ticket_price) as total_amount'),
                    'order_details.created_at'
                ])
                ->join('event_tickets', 'event_tickets.ticket_id', '=', 'order_details.ticket_id')
                ->join('events', 'events.evt_id', '=', 'event_tickets.evt_id')
                ->where('events.partnership_id', $partnershipId)
        )
        ->columns([
            TextColumn::make("order_detail_id")
                ->label("Order ID"),
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
            TextColumn::make("created_at")
                ->label("Order Date")
                ->dateTime('M d, Y h:i A'),
        ]);
            // ->filters([
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
            // ]);
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
