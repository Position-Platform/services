<?php

namespace App\Filament\Resources\OsmDataResource\Pages;

use App\Filament\Resources\OsmDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOsmData extends ListRecords
{
    protected static string $resource = OsmDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
