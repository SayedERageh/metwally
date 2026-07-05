<?php

namespace App\Filament\Resources\Productes;

use App\Filament\Resources\Productes\Pages\CreateProductes;
use App\Filament\Resources\Productes\Pages\EditProductes;
use App\Filament\Resources\Productes\Pages\ListProductes;
use App\Filament\Resources\Productes\Schemas\ProductesForm;
use App\Filament\Resources\Productes\Tables\ProductesTable;
use App\Models\Product;
use App\Models\Productes;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ProductesResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationLabel = 'اضافة منتج جديد';

protected static string|UnitEnum|null $navigationGroup = 'المنتجات';
    protected static ?string $modelLabel = 'منتج';

    protected static ?string $pluralModelLabel = 'المنتجات';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ProductesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProductes::route('/'),
            'create' => CreateProductes::route('/create'),
            'edit' => EditProductes::route('/{record}/edit'),
        ];
    }
}
