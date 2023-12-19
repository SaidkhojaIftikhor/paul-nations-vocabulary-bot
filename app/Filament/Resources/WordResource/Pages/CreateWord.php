<?php

namespace App\Filament\Resources\WordResource\Pages;

use App\Filament\Resources\WordResource;
use Filament\Resources\Pages\CreateRecord;

class CreateWord extends CreateRecord {
    protected static string $resource = WordResource::class;

    protected function getActions(): array {
        return [

        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
