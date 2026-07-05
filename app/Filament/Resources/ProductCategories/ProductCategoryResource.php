<?php

namespace App\Filament\Resources\ProductCategories;

use App\Filament\Resources\ProductCategories\Pages\ManageProductCategories;
use App\Models\ProductCategory;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use UnitEnum;

class ProductCategoryResource extends Resource
{
    protected static ?string $model = ProductCategory::class;
    protected static ?string $navigationLabel = 'اقسام المنتجات';

protected static string|UnitEnum|null $navigationGroup = 'المنتجات';
    protected static ?string $modelLabel = 'كاتجوري';

    protected static ?string $pluralModelLabel = 'التصنيفات';
protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingBag;
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                                  // اسم الكاتجوري
                TextInput::make('name')
                    ->label('اسم الكاتجوري')
                    ->required()
                    ,
      TextInput::make('description')
                    ->label(' الوصــــف')
                    ->required()
                    ->unique(ignoreRecord: true)
                  ,
                        FileUpload::make('image')
                ->label('صورة القسم')
                ->image()
                    ->disk('public')

                ->directory('categories')
                ->nullable(),
       

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
          // Slug
          
          TextColumn::make('name')
                    ->label('الاســـــم ')
                    ,    
                      TextColumn::make('description')
                    ->label('وصف القسم')
                    
                    ->wrap(),
                        ImageColumn::make('image')
    ->label('الصورة')
    ->disk('public')
    ->circular(),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageProductCategories::route('/'),
        ];
    }
}
