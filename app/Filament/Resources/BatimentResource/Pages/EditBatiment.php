<?php

namespace App\Filament\Resources\BatimentResource\Pages;

use App\Filament\Resources\BatimentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBatiment extends EditRecord
{
    protected static string $resource = BatimentResource::class;

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
