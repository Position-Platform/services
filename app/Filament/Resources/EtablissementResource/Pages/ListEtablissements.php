<?php

namespace App\Filament\Resources\EtablissementResource\Pages;

use App\Filament\Resources\EtablissementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEtablissements extends ListRecords
{
    protected static string $resource = EtablissementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
