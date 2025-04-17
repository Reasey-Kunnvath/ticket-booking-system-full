<?php

namespace App\Filament\EventProvider\Resources;

use App\Filament\EventProvider\Resources\EventResource\Pages;
use App\Filament\EventProvider\Resources\EventResource\RelationManagers;
use App\Models\Event;
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

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('cate_id')->label("Event Category")
                    ->relationship('eventCategory', 'cate_name')
                    ->required(),
                Select::make('partnership_id')->label("partnership")
                    ->relationship('partnership', 'org_name')
                    ->required(),
                TextInput::make("evt_name")->label("Name")->required()->minLength(2),
                TextInput::make("evt_policy")->label("Policy")->required()->minLength(2),
                DatePicker::make('evt_start_date')->minDate(now())->label("start date"),
                DatePicker::make('evt_end_date')->label("end date"),
                TextInput::make("evt_address")->label("address"),
                Textarea::make("evt_description")->label("description"),
                TextInput::make("evt_address_link")->label("address link"),
                Select::make('status')
                    ->options([
                        '0' => 'Active',
                        '1' => 'Inactive',

                    ])
                    ->required(),
                Select::make('evt_status')->label("Event Status")
                    ->options([
                        '0' => 'Pending',
                        '1' => 'Approved',
                        '2' => 'Rejected',
                    ])
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('evt_name')->label("Name"),
                TextColumn::make('evt_start_date')->label("Start Date"),
                TextColumn::make('evt_end_date')->label("End Date"),
                TextColumn::make('evt_address')->label("Address"),
                TextColumn::make('evt_status')->label("Event Status")
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        '0' => 'Pending',
                        '1' => 'Approved',
                        '2' => 'Rejected',
                    })
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'yellow',
                        '1' => 'success',
                        '1' => 'success',
                    }),
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
                TextColumn::make("eventCategory.cate_name")->label("Event Category"),
                TextColumn::make("partnership.org_name")->label("Partnership"),
                TextColumn::make('evt_address_link')->label(" Address Link"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
