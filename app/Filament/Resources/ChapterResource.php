<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChapterResource\Pages;
use App\Filament\Resources\ChapterResource\RelationManagers\UnitsRelationManager;
use App\Models\Chapter;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ChapterResource extends Resource {
    protected static ?string $model = Chapter::class;
    protected static ?string $slug = 'chapters';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    public static function form(Form $form): Form {
        return $form->schema([
            TextInput::make('number')
                ->required()
                ->integer(),

            TextInput::make('title')
                ->required(),

            Placeholder::make('created_at')
                ->label('Created Date')
                ->content(fn(?Chapter $record): string => $record?->created_at?->diffForHumans() ?? '-'),

            Placeholder::make('updated_at')
                ->label('Last Modified Date')
                ->content(fn(?Chapter $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            TextColumn::make('id')
                ->translateLabel()
                ->label('#')
                ->sortable(),
            TextColumn::make('number'),

            TextColumn::make('title')
                ->translateLabel()
                ->label('Title')
                ->searchable()
                ->sortable(),

            TextColumn::make('created_at')
                ->translateLabel()
                ->label('Datetime')
                ->dateTime()
                ->sortable(),
        ])
            ->actions([
                EditAction::make()
            ]);
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListChapters::route('/'),
            'create' => Pages\CreateChapter::route('/create'),
            'view' => Pages\ViewChapter::route('/{record}'),
        ];
    }

    public static function getGloballySearchableAttributes(): array {
        return ['title'];
    }
}
