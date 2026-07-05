<?php

namespace App\Filament\Resources\Sliders\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SliderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('title')
                    ->label('العنوان')
                    ->maxLength(255),

                FileUpload::make('image')
                    ->label('الصورة')
                    ->disk('public')
                    ->image()
                    ->directory('sliders')
                    ->required(),

           

                Toggle::make('active')
                    ->label('نشط')
                    ->default(true),

            ]);
    }
}