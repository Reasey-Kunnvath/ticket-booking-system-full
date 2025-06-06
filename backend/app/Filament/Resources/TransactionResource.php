<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use App\Models\Transactions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transactions::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Finacial Management';

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
                TextColumn::make('order.user.name')
                    ->label('Order By')
                    ->searchable(),
                TextColumn::make('order.ticket.ticket_title')
                    ->label('Ticket')
                    ->searchable(),
                TextColumn::make('amount')
                    ->label('Amount')
                    ->sortable(),
                TextColumn::make('currency')
                    ->label('Currency')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Transaction Date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('method.method_name')
                    ->label('Payment Method'),
                TextColumn::make('status.status_name')
                    ->label('Status')
                    ->sortable(),
            ])
            ->filters([
                //
                SelectFilter::make("method_id")->relationship("method", "method_name")->label("Payment Method"),
                SelectFilter::make("status")->relationship("status", "status_name")->label("Transaction Status"),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
