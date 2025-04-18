<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CouponResource\Pages;
use App\Filament\Resources\CouponResource\RelationManagers;
use App\Models\Coupon;
use App\Models\Coupons;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CouponResource extends Resource
{
    protected static ?string $model = Coupons::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Coupons Management';



    public static function form(Form $form): Form
    {
        return $form->defaultSort('created_at', 'desc')
            ->schema([
                //
                Select::make('evt_id')
                    ->relationship('event', 'evt_name')
                    ->required(),
                TextInput::make("coupons_title")->required()->minLength(2)->label("Title"),
                TextInput::make("coupons_type")->required()->minLength(2)->label("Type"),
                TextInput::make("coupons_value")->required()->minLength(2)->label("Value"),
                Select::make('status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive'
                    ])
                    ->required()
                    ->default('1'),
                TextInput::make("max_use")->required()->integer()->label("Max Use"),
                DatePicker::make("start_date")->required(),
                DatePicker::make("end_date")->required(),
                Hidden::make('createdby')
                    ->default(auth()->id())
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("coupons_title")->label('Title')->searchable(),
                TextColumn::make("coupons_type")->label('Type'),
                TextColumn::make("coupons_value")->label('Values'),
                TextColumn::make("event.evt_name")->label('Event'),
                TextColumn::make("max_use")->label('Max Use'),
                TextColumn::make("status")
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        '0' => 'Inactive',
                        '1' => 'Active',
                    })
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'danger',
                        '1' => 'success',
                    }),
                TextColumn::make("start_date")->label('Start Date'),
                TextColumn::make("end_date")->label('End Date'),
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
            'index' => Pages\ListCoupons::route('/'),
            // 'create' => Pages\CreateCoupon::route('/create'),
            // 'edit' => Pages\EditCoupon::route('/{record}/edit'),
        ];
    }
}
