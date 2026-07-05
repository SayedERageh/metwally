<?php

namespace App\Filament\Resources\Productes\Pages;

use App\Filament\Resources\Productes\ProductesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProductes extends ListRecords
{
    protected static string $resource = ProductesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
