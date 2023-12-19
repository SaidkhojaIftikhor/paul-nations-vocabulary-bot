<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnitResource\Pages;
use App\Filament\Resources\UnitResource\RelationManagers;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitResource extends Resource {
    protected static ?string $model = Unit::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->translateLabel()
                    ->label('Title')
                    ->required()
                    ->string()
                    ->maxLength(255),
                Forms\Components\TextInput::make('number')
                    ->translateLabel()
                    ->label('Number')
                    ->required()
                    ->integer(),
                Forms\Components\Select::make('chapter_id')
                    ->relationship('chapter', 'title')
                    ->required()
                    ->hiddenOn('edit')
            ]);
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->translateLabel()
                    ->label('#')
                    ->sortable(),
                Tables\Columns\TextColumn::make('number')
                    ->translateLabel()
                    ->label('Number')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->translateLabel()
                    ->label('Title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('chapter.title')
                    ->translateLabel()
                    ->label('Chapter title')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListUnits::route('/'),
            'create' => Pages\CreateUnit::route('/create'),
            'view' => Pages\ViewUnit::route('/{record}'),
        ];
    }
}
