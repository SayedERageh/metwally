<?php

namespace App\Filament\Resources\Orders\Tables;
 use Filament\Tables\Columns\TextColumn; use Filament\Tables\Columns\ImageColumn;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns(
[ TextColumn::make('order_number') ->label('رقم الطلب') ->searchable() ->sortable(), TextColumn::make('first_name') ->label('الاسم الأول') ->searchable(), TextColumn::make('last_name') ->label('اسم العائلة') ->searchable(), TextColumn::make('phone') ->label('رقم الهاتف') ->searchable(), TextColumn::make('email') ->label('البريد الإلكتروني') ->searchable() ->toggleable(), TextColumn::make('governorate') ->label('المحافظة') ->searchable() ->sortable(), TextColumn::make('city') ->label('المدينة') ->searchable() ->toggleable(), TextColumn::make('area') ->label('المنطقة') ->searchable() ->toggleable(), TextColumn::make('subtotal') ->label('المجموع الفرعي') ->money('EGP') ->sortable(), TextColumn::make('shipping') ->label('الشحن') ->money('EGP') ->sortable(), TextColumn::make('discount') ->label('الخصم') ->money('EGP') ->sortable(), TextColumn::make('total') ->label('الإجمالي') ->money('EGP') ->sortable(), TextColumn::make('payment_method') ->label('طريقة الدفع') ->badge() ->formatStateUsing(fn ($state) => match ($state) { 'cash' => 'الدفع عند الاستلام', 'bank_transfer' => 'تحويل بنكي', 'vodafone_cash' => 'فودافون كاش', default => $state, }), ImageColumn::make('payment_image') ->label('صورة التحويل') ->disk('public') ->toggleable(), TextColumn::make('status') ->label('حالة الطلب') ->badge() ->formatStateUsing(fn ($state) => match ($state) { 'pending' => 'قيد المراجعة', 'confirmed' => 'تم التأكيد', 'processing' => 'جاري التجهيز', 'shipped' => 'تم الشحن', 'delivered' => 'تم التسليم', 'cancelled' => 'ملغي', default => $state, }) ->color(fn ($state) => match ($state) { 'pending' => 'warning', 'confirmed' => 'info', 'processing' => 'primary', 'shipped' => 'info', 'delivered' => 'success', 'cancelled' => 'danger', default => 'gray', }) ->sortable(), TextColumn::make('created_at') ->label('تاريخ الطلب') ->dateTime('d/m/Y H:i') ->sortable() ->toggleable(), ]
            )
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
