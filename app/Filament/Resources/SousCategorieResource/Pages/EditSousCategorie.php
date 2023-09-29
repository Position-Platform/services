<?php

namespace App\Filament\Resources\SousCategorieResource\Pages;

use App\Filament\Resources\SousCategorieResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSousCategorie extends EditRecord
{
    protected static string $resource = SousCategorieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
