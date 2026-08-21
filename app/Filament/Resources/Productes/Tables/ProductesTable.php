<?php

namespace App\Filament\Resources\Productes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('images')
                    ->label('الصورة')
                    ->circular()
                    ->getStateUsing(
                        fn ($record) => $record->images[0] ?? null
                    ),

                TextColumn::make('name')
                    ->label('اسم المنتج')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('القسم')
                    ->searchable()
                    ->sortable()
                    ->badge(),

                TextColumn::make('branch.name')
                    ->label('الفرع')
                    ->searchable()
                    ->sortable()
                    ->badge(),

                TextColumn::make('price')
                    ->label('السعر الأصلي')
                    ->money('EGP')
                    ->sortable(),

                TextColumn::make('sale_price')
                    ->label('سعر الخصم')
                    ->money('EGP')
                    ->sortable(),

                TextColumn::make('quantity')
                    ->label('الكمية')
                    ->badge()
                    ->sortable(),

                IconColumn::make('is_new')
                    ->label('جديد')
                    ->boolean(),

                IconColumn::make('is_featured')
                    ->label('مميز')
                    ->boolean(),

                IconColumn::make('status')
                    ->label('الحالة')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime('Y-m-d')
                    ->sortable(),

            ])

            ->filters([

                //

            ])

            ->recordActions([
                EditAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}