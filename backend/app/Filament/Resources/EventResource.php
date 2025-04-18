<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use App\Models\User;
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
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Tables\Filters\SelectFilter;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Event Management';




    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Basic Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('cate_id')
                                    ->label("Event Category")
                                    ->relationship('eventCategory', 'cate_name')
                                    ->required(),

                                Select::make('partnership_id')
                                    ->label("Partnership")
                                    ->relationship('partnership', 'org_name')
                                    ->required(),

                                TextInput::make("evt_name")
                                    ->label("Name")
                                    ->required()
                                    ->minLength(2),

                                TextInput::make("evt_policy")
                                    ->label("Policy")
                                    ->required()
                                    ->minLength(2),
                            ]),
                    ])
                    ->columns(1),

                Section::make('Event Details')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                DatePicker::make('evt_start_date')
                                    ->minDate(now())
                                    ->label("Start Date")
                                    ->required(),

                                DatePicker::make('evt_end_date')
                                    ->label("End Date")
                                    ->required(),
                            ]),

                        TextInput::make("evt_address")
                            ->label("Address"),

                        TextInput::make("evt_address_link")
                            ->label("Address Link"),

                        Textarea::make("evt_description")
                            ->label("Description")
                            ->rows(5),
                    ])
                    ->columns(1),

                Section::make('Status')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('status')
                                    ->options([
                                        '0' => 'Active',
                                        '1' => 'Inactive',
                                    ])
                                    ->required(),

                                Select::make('evt_status')
                                    ->label("Event Status")
                                    ->options([
                                        '0' => 'Pending',
                                        '1' => 'Approved',
                                        '2' => 'Rejected',
                                    ])
                                    ->required(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('evt_name')->label("Name")->searchable(),
                TextColumn::make('evt_start_date')->label("Start Date"),
                TextColumn::make('evt_end_date')->label("End Date"),
                TextColumn::make('evt_address')->label("Address"),
                TextColumn::make('evt_status')->label("Event Status")
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

            ])
            ->filters([
                SelectFilter::make('cate_id')
                    ->relationship("eventCategory", "cate_name")
                    ->label("Event Category"),

                SelectFilter::make('partnership_id')
                    ->relationship("partnership", "org_name")
                    ->label("Partnership"),

                SelectFilter::make('evt_status')
                    ->label("Event Status")
                    ->options([
                        '0' => 'Rejected',
                        '1' => 'Approved',
                        '2' => 'Pending',
                    ]),

                SelectFilter::make('status')
                    ->label("Status")
                    ->options([
                        '0' => 'Inactive',
                        '1' => 'Active',
                    ]),

                Tables\Filters\Filter::make('evt_start_date')
                    ->form([
                        DatePicker::make('start')->label('Start From'),
                        DatePicker::make('end')->label('Start Until'),
                    ])
                    ->query(
                        fn($query, $data) => $query
                            ->when($data['start'], fn($q) => $q->whereDate('evt_start_date', '>=', $data['start']))
                            ->when($data['end'], fn($q) => $q->whereDate('evt_start_date', '<=', $data['end']))
                    ),

                Tables\Filters\Filter::make('evt_end_date')
                    ->form([
                        DatePicker::make('start')->label('End From'),
                        DatePicker::make('end')->label('End Until'),
                    ])
                    ->query(
                        fn($query, $data) => $query
                            ->when($data['start'], fn($q) => $q->whereDate('evt_end_date', '>=', $data['start']))
                            ->when($data['end'], fn($q) => $q->whereDate('evt_end_date', '<=', $data['end']))
                    ),
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
            'index' => Pages\ListEvents::route('/'),
            // 'create' => Pages\CreateEvent::route('/create'),
            // 'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
