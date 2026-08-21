<?php

namespace App\Filament\Resources\Governorates\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GovernorateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')
                    ->label('اسم المحافظة')
                    ->placeholder('مثال: القاهرة')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                TextInput::make('shipping_price')
                    ->label('سعر الشحن')
                    ->numeric()
                    ->suffix('جنيه')
                    ->default(0)
                    ->minValue(0)
                    ->required(),
                    
                Toggle::make('is_active')
                    ->label('المحافظة مفعلة')
                    ->default(true),

            ]);
    }
}