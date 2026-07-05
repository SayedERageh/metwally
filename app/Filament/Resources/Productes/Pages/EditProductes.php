<?php

namespace App\Filament\Resources\Productes\Pages;

use App\Filament\Resources\Productes\ProductesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProductes extends EditRecord
{
    protected static string $resource = ProductesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
