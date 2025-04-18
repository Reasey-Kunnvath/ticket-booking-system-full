<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventCategoryResource\Pages;
use App\Models\EventCategory;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class EventCategoryResource extends Resource
{
    protected static ?string $model = EventCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Event Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('cate_name')
                    ->label("Category Name")
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive'
                    ])
                    ->required()
                    ->default('1')
                    ->columnSpanFull(),
                Textarea::make('cate_description')
                    ->label("Description")
                    ->required()
                    ->columnSpanFull(),

                Hidden::make('created_by')
                    ->default(auth()->id())
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('cate_name')->label("Name")->searchable(),
                TextColumn::make('status')
                    ->formatStateUsing(fn(string $state): string => $state === '1' ? 'Active' : 'Inactive')
                    ->badge()
                    ->color(fn(string $state): string => $state === '1' ? 'success' : 'danger'),
                TextColumn::make('cate_description')->label("Description"),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        '0' => 'Inactive',
                        '1' => 'Active',
                    ])

            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalHeading('Edit Event Category')
                    ->modal()
                    ->successRedirectUrl("/admin/event-categories"),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventCategories::route('/'),
        ];
    }
}
