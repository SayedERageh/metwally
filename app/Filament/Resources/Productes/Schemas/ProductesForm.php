<?php

namespace App\Filament\Resources\Productes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('اسم المنتج')
                    ->required()
                    ->maxLength(255),

                Select::make('category_id')
                    ->label('التصنيف')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('price')
                    ->label('السعر الأصلي')
                    ->numeric()
                    ->required(),

                TextInput::make('sale_price')
                    ->label('سعر الخصم')
                    ->numeric(),

                TextInput::make('quantity')
                    ->label('الكمية')
                    ->numeric()
                    ->default(0)
                    ->required(),

                Toggle::make('is_new')
                    ->label('منتج جديد')
                    ->default(false),

                Toggle::make('is_featured')
                    ->label('منتج مميز')
                    ->default(false),

                Toggle::make('status')
                    ->label('متاح للبيع')
                    ->default(true),

                RichEditor::make('description')
                    ->label('الوصف')
                    ->columnSpanFull(),

                FileUpload::make('images')
                    ->label('صور المنتج')
                    ->multiple()
                    ->image()
                    ->directory('products')
                    ->reorderable()
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }
}