<?php

namespace App\Filament\Resources\EtablissementResource\Pages;

use App\Filament\Resources\EtablissementResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEtablissement extends ViewRecord
{
    protected static string $resource = EtablissementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
