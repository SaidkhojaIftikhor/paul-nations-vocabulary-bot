<?php

namespace App\Filament\Resources\ChapterResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitsRelationManager extends RelationManager {
    protected static string $relationship = 'units';

    public function form(Form $form): Form {
        return $form
            ->schema([
                Forms\Components\TextInput::make('chapter_id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table {
        return $table
            ->recordTitleAttribute('id')
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
            ->headerActions([
                Tables\Actions\CreateAction::make()
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
}
