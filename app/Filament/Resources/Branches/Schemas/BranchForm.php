<?php

namespace App\Filament\Resources\Branches\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class BranchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')
                    ->label('اسم الفرع')
                    ->placeholder('مثال: ثرموستات')
                    ->required()
                    ->maxLength(255),

                // اسم القسم
                Select::make('category_id')
                    ->label('اسم القسم')
                    ->relationship('category', 'name')
                    ->preload()
                    ->native(false)
                    ->required(),

                TextInput::make('slug')
                    ->label('الرابط المختصر')
                    ->placeholder('thermostat')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('وصف الفرع')
                    ->placeholder('وصف مختصر للفرع...')
                    ->rows(4)
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('صورة الفرع')
                    ->image()
                    ->disk('public')
                    ->directory('branches')
                    ->imageEditor(),

                Toggle::make('status')
                    ->label('نشط')
                    ->default(true),

                TextInput::make('sort_order')
                    ->label('الترتيب')
                    ->numeric()
                    ->default(0)
                    ->minValue(0),

            ]);
    }
}