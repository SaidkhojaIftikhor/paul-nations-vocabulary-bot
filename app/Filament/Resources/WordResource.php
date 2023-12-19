<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WordResource\Pages;
use App\Models\Word;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WordResource extends Resource {
    protected static ?string $model = Word::class;
    protected static ?string $slug = 'words';
    protected static ?string $recordTitleAttribute = 'id';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form {
        return $form->schema([
            TextInput::make('value')
                ->required(),

            Select::make('unit_id')
                ->relationship('')
                ->required(),

            Placeholder::make('created_at')
                ->label('Created Date')
                ->content(fn(?Word $record): string => $record?->created_at?->diffForHumans() ?? '-'),

            Placeholder::make('updated_at')
                ->label('Last Modified Date')
                ->content(fn(?Word $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            TextColumn::make('value'),

            TextColumn::make('unit_id'),

            TextColumn::make('options'),
        ]);
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListWords::route('/'),
            'create' => Pages\CreateWord::route('/create'),
        ];
    }

    public static function getGloballySearchableAttributes(): array {
        return [];
    }
}
