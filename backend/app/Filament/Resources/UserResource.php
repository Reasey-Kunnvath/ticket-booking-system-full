<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\PartnershipDetail;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'User & Role Management';
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("name")->required(),
                TextInput::make("email")->required(),
                TextInput::make("phone_number")->required(),
                Select::make('role_id')
                    ->relationship('role', 'role_name')
                    ->required()
                    ->live(),
                Select::make('partnership_id')
                    ->relationship(
                        name: 'partnership',
                        titleAttribute: 'org_name',
                        // modifyQueryUsing: function (Builder $query) {
                        //     $query->where("req_status", 2)->whereDoesntHave('user');
                        // }
                    )
                    ->visible(fn(Get $get) => $get('role_id') == 2)
                    ->required(fn(Get $get) => $get('role_id') == 2)
                    ->live(),
                TextInput::make("password")
                    ->password()
                    ->required()
                    ->minLength(5)
                    ->dehydrateStateUsing(fn($state) => bcrypt($state)),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('role.role_name')
                    ->badge()
                    ->color(fn($record) => match ($record->role_id) {
                        config("roles.admin") => 'danger',
                        config("roles.event-provider")  => 'warning',
                        config("roles.user")  => 'success',
                        default => 'gray'
                    }),
                TextColumn::make('email')->searchable(),
                TextColumn::make('phone_number')->searchable(),
            ])
            ->filters([
                SelectFilter::make("role_id")->label("Role")->relationship("role", "role_name")

            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modal(),
                Tables\Actions\DeleteAction::make()

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
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            // 'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
