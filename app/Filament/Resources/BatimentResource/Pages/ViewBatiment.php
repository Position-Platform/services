<?php

namespace App\Filament\Resources\BatimentResource\Pages;

use App\Filament\Resources\BatimentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBatiment extends ViewRecord
{
    protected static string $resource = BatimentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
