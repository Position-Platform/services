<?php

namespace App\Filament\Resources\OsmDataResource\Pages;

use App\Filament\Resources\OsmDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOsmData extends ViewRecord
{
    protected static string $resource = OsmDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
