<?php

namespace App\Filament\Resources\Governorates\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GovernoratesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->label('المحافظة')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('shipping_price')
                    ->label('سعر الشحن')
                    ->numeric(
                        decimalPlaces: 2
                    )
                    ->suffix(' ج.م')
                    ->sortable(),
                TextColumn::make('cities_count')
                    ->label('عدد المدن')
                    ->counts('cities')
                    ->sortable(),


                IconColumn::make('is_active')
                    ->label('الحالة')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime('d/m/Y')
                    ->sortable(),

            ])

            ->filters([

                //

            ])

            ->recordActions([
                EditAction::make()
                    ->label('تعديل'),
            ])

            ->toolbarActions([

                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('حذف المحدد'),
                ]),

            ]);
    }
}