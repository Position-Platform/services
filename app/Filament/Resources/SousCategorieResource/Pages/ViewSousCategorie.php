<?php

namespace App\Filament\Resources\SousCategorieResource\Pages;

use App\Filament\Resources\SousCategorieResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSousCategorie extends ViewRecord
{
    protected static string $resource = SousCategorieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
