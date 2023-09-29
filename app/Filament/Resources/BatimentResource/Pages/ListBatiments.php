<?php

namespace App\Filament\Resources\BatimentResource\Pages;

use App\Filament\Resources\BatimentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBatiments extends ListRecords
{
    protected static string $resource = BatimentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
