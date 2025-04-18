<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionStatusResource\Pages;
use App\Filament\Resources\TransactionStatusResource\RelationManagers;
use App\Models\TransactionStatus;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionStatusResource extends Resource
{
    protected static ?string $model = TransactionStatus::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-circle';

    protected static ?string $navigationGroup = 'Finacial Management';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('status_name')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->defaultSort('created_at', 'desc')
            ->columns([
                //
                TextColumn::make('status_name')->label("Status")->searchable()
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
            'index' => Pages\ListTransactionStatuses::route('/'),
            // 'create' => Pages\CreateTransactionStatus::route('/create'),
            // 'edit' => Pages\EditTransactionStatus::route('/{record}/edit'),
        ];
    }
}
