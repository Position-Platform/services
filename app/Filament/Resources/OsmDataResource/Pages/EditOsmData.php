<?php

namespace App\Filament\Resources\OsmDataResource\Pages;

use App\Filament\Resources\OsmDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOsmData extends EditRecord
{
    protected static string $resource = OsmDataResource::class;

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
