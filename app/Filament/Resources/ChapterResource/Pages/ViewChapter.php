<?php

namespace App\Filament\Resources\ChapterResource\Pages;

use App\Filament\Resources\ChapterResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewChapter extends ViewRecord {
    protected static string $resource = ChapterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    public function getRelationManagers(): array {
        return [
            ChapterResource\RelationManagers\UnitsRelationManager::make()
        ];
    }
}