<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnershipDetailResource\Pages;
use App\Models\PartnershipDetail;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Model;

class PartnershipDetailResource extends Resource
{
    protected static ?string $model = PartnershipDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Partnership Management';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()
                    ->label('Organization Information')
                    ->schema([
                        TextInput::make('org_name')
                            ->required()
                            ->maxLength(255)
                            ->label('Organization Name')
                            ->placeholder('Enter the organization name')
                            ->columnSpan(2),
                        TextInput::make('org_type')
                            ->required()
                            ->maxLength(255)
                            ->label('Organization Type')
                            ->placeholder('Enter the organization type')
                            ->columnSpan(2),
                        Textarea::make('org_address')
                            ->required()
                            ->maxLength(65535)
                            ->label('Organization Address')
                            ->placeholder('Enter the organization address')
                            ->columnSpanFull(),
                    ]),
                Fieldset::make()
                    ->label('Contact Information')
                    ->schema([
                        TextInput::make('org_email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->label('Organization Email')
                            ->placeholder('Enter the organization email'),
                        TextInput::make('org_phone_number')
                            ->tel()
                            ->required()
                            ->maxLength(255)
                            ->label('Organization Phone Number')
                            ->placeholder('Enter the organization phone number'),
                    ]),
                Fieldset::make()
                    ->label('Ambassador Information')
                    ->schema([
                        TextInput::make('ambassador_name')
                            ->required()
                            ->maxLength(255)
                            ->label('Ambassador Name')
                            ->placeholder('Enter the ambassador name'),
                        TextInput::make('ambassador_email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->label('Ambassador Email')
                            ->placeholder('Enter the ambassador email'),
                        TextInput::make('ambassador_phone')
                            ->tel()
                            ->required()
                            ->maxLength(255)
                            ->label('Ambassador Phone')
                            ->placeholder('Enter the ambassador phone'),
                    ]),
                Fieldset::make()
                    ->label('Status Information')
                    ->schema([
                        Select::make('status')
                            ->options([
                                '0' => 'Inactive',
                                '1' => 'Active',
                            ])
                            ->required()
                            ->label('Organization Status')
                            ->placeholder('Select status'),

                        Select::make('req_status')
                            ->options([
                                '0' => 'Rejected',
                                '1' => 'Approved',
                                '2' => 'Pending',
                            ])
                            ->required()
                            ->label('Request Status')
                            ->placeholder('Select request status'),
                    ]),
            ]);
    }



    public static function table(Table $table): Table
    {
        return $table->query(
            PartnershipDetail::query()->with('user')
        )
            ->actionsPosition(Tables\Enums\ActionsPosition::BeforeColumns)
            ->columns([
                TextColumn::make("org_name")->label("Name")->searchable(),
                TextColumn::make("org_type")->label("Type"),
                TextColumn::make("org_email")->label("Email")->searchable(),
                TextColumn::make("org_phone_number")->label("Phone")->searchable(),
                TextColumn::make("user.name")
                    ->label("Login Account")
                    ->searchable()
                    ->formatStateUsing(fn($state) => $state ?? "N/A"),
                // TextColumn::make("status")
                //     ->badge()
                //     ->color(fn(string $state): string => match ($state) {
                //         '0' => 'danger',
                //         '1' => 'success',
                //     })
                //     ->formatStateUsing(fn(string $state): string => match ($state) {
                //         '0' => 'Inactive',
                //         '1' => 'Active',
                //     }),
                TextColumn::make("req_status")->label("Request Status")
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'danger',
                        '1' => 'success',
                        '2' => 'warning',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        '0' => 'Rejected',
                        '1' => 'Approved',
                        '2' => 'Pending',
                    }),

            ])
            ->filters([
                //
                SelectFilter::make('req_status')
                    ->options([
                        '0' => 'Rejected',
                        '1' => 'Approved',
                        '2' => 'Pending',
                    ]),
                SelectFilter::make('status')
                    ->options([
                        '0' => 'Rejected',
                        '1' => 'Approved',
                    ])
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make()->modal()->color('primary'),
                    ViewAction::make()
                        ->label('View')
                        ->icon('heroicon-o-eye')
                        ->color('info')
                        ->modalHeading('View Partnership Details')
                        ->form([
                            Fieldset::make()
                                ->label('Organization Information')
                                ->schema([
                                    TextInput::make('org_name')
                                        ->label('Organization Name')
                                        ->disabled()
                                        ->default(fn(Model $record) => $record->org_name)
                                        ->columnSpan(2),
                                    TextInput::make('org_type')
                                        ->label('Organization Type')
                                        ->disabled()
                                        ->default(fn(Model $record) => $record->org_type)
                                        ->columnSpan(2),
                                    Textarea::make('org_address')
                                        ->label('Organization Address')
                                        ->disabled()
                                        ->default(fn(Model $record) => $record->org_address)
                                        ->columnSpanFull(),
                                ]),
                            Fieldset::make()
                                ->label('Contact Information')
                                ->schema([
                                    TextInput::make('org_email')
                                        ->label('Organization Email')
                                        ->disabled()
                                        ->default(fn(Model $record) => $record->org_email),
                                    TextInput::make('org_phone_number')
                                        ->label('Organization Phone Number')
                                        ->disabled()
                                        ->default(fn(Model $record) => $record->org_phone_number),
                                ]),
                            Fieldset::make()
                                ->label('Ambassador Information')
                                ->schema([
                                    TextInput::make('ambassador_name')
                                        ->label('Ambassador Name')
                                        ->disabled()
                                        ->default(fn(Model $record) => $record->ambassador_name),
                                    TextInput::make('ambassador_email')
                                        ->label('Ambassador Email')
                                        ->disabled()
                                        ->default(fn(Model $record) => $record->ambassador_email),
                                    TextInput::make('ambassador_phone')
                                        ->label('Ambassador Phone')
                                        ->disabled()
                                        ->default(fn(Model $record) => $record->ambassador_phone),
                                ]),
                            Fieldset::make()
                                ->label('Status Information')
                                ->schema([
                                    Select::make('status')
                                        ->label('Organization Status')
                                        ->disabled()
                                        ->default(fn(Model $record) => $record->status)
                                        ->options([
                                            '1' => 'Active',
                                            '0' => 'Inactive',
                                        ]),
                                    Select::make('req_status')
                                        ->label('Request Status')
                                        ->disabled()
                                        ->default(fn(Model $record) => $record->req_status)
                                        ->options([
                                            '0' => 'Pending',
                                            '1' => 'Approved',
                                            '2' => 'Rejected',
                                        ]),
                                ]),
                        ])
                        ->action(fn(Model $record) => $record),
                    Action::make('toggle_status')
                        ->label(fn(Model $record): string => match ($record->req_status) {
                            '1' => 'Reject',
                            '0' => 'Approve',
                            '2' => 'Update Request Status',
                            default => 'Update Status',
                        })
                        ->color(fn(Model $record) => match ($record->req_status) {
                            '1' => 'danger',
                            '0' => 'success',
                            '2' => 'warning',
                            // default => 'secondary',
                        })
                        ->icon(fn(Model $record) => match ($record->req_status) {
                            '1' => 'heroicon-o-x-circle',
                            '0' => 'heroicon-o-check-circle',
                            '2' => 'heroicon-o-exclamation-circle',
                            default => 'heroicon-o-pencil',
                        })
                        ->requiresConfirmation()
                        ->modalHeading(fn(Model $record) => $record->req_status == '2'
                            ? 'Pending Request'
                            : 'Confirm Status Change')
                        ->modalHeading(fn(Model $record) => $record->req_status == '2'
                            ? 'Do you want to approve or reject this pending request?'
                            : 'Are you sure you want to change the request status?')
                        ->modalButton(fn(Model $record) => $record->req_status == '1' ? 'Reject' : 'Approve')
                        ->extraModalFooterActions(
                            fn(Model $record) => $record->req_status == '2'
                                ? [
                                    Tables\Actions\Action::make('reject')
                                        ->label('Reject')
                                        ->color('danger')
                                        ->action(fn(Model $record) => $record->update(['req_status' => '0'])),
                                ]
                                : []
                        )
                        ->action(function (Model $record) {
                            if ($record->req_status == '1') {
                                $record->update(['req_status' => '0']);
                            } elseif ($record->req_status == '0') {
                                $record->update(['req_status' => '1']);
                            } elseif ($record->req_status == '2') {
                                $record->update(['req_status' => '1']);
                            }
                        }),
                    Tables\Actions\DeleteAction::make(),

                ]),
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
        ];
    }
}
