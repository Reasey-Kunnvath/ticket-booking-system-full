<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnershipDetailResource\Pages;
use App\Models\PartnershipDetail;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;


class PartnershipDetailResource extends Resource
{
    protected static ?string $model = PartnershipDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Partnership Management';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('org_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('org_type')
                    ->required()
                    ->maxLength(255),
                Textarea::make('org_address')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                TextInput::make('org_email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('org_phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                TextInput::make('ambassador_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('ambassador_email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('ambassador_phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Select::make('status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ])
                    ->required(),
                Select::make('req_status')
                    ->options([
                        '0' => 'Pending',
                        '1' => 'Approved',
                        '2' => 'Rejected',
                    ])
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("user.name"),
                TextColumn::make("org_name"),
                TextColumn::make("org_type"),
                TextColumn::make("org_address"),
                TextColumn::make("org_email"),
                TextColumn::make("org_phone_number"),
                TextColumn::make("ambassador_email"),
                TextColumn::make("ambassador_email"),
                TextColumn::make("ambassador_phone"),
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
                TextColumn::make("req_status")->badge()
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
            'index' => Pages\ListPartnershipDetails::route('/'),
            // 'create' => Pages\CreatePartnershipDetail::route('/create'),
            // 'edit' => Pages\EditPartnershipDetail::route('/{record}/edit'),
        ];
    }
}
