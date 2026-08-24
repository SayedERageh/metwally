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
                    ->placeholder('مثال: موتور ثلاجة')
                    ->required()
                    ->maxLength(255),

                Select::make('category_id')
                    ->label('القسم')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required(),

                Select::make('branch_id')
                    ->label('الفرع')
                    ->relationship(
                        'branch',
                        'name',
                        fn ($query, $get) =>
                            $query->when(
                                $get('category_id'),
                                fn ($query, $categoryId) =>
                                    $query->where('category_id', $categoryId)
                            )
                    )
                    ->searchable()
                    ->preload()
                    ->required()
                    ->disabled(fn ($get) => ! $get('category_id'))
                    ->helperText('اختر القسم أولاً لعرض الفروع التابعة له'),

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