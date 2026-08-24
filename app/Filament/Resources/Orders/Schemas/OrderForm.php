<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // =====================================================
                // بيانات الطلب
                // =====================================================

                Section::make('بيانات الطلب')
                    ->description('معلومات أساسية عن الطلب')
                    ->icon('heroicon-o-shopping-bag')
                    ->schema([

                        TextInput::make('order_number')
                            ->label('رقم الطلب')
                            ->disabled(),

                        Select::make('status')
                            ->label('حالة الطلب')
                            ->options([
                                'pending' => 'قيد الانتظار',
                                'processing' => 'جاري التجهيز',
                                'shipped' => 'تم الشحن',
                                'completed' => 'مكتمل',
                                'cancelled' => 'ملغي',
                            ])
                            ->native(false)
                            ->required(),

                    ])
                    ->columns(2),


                // =====================================================
                // المنتجات داخل الطلب
                // =====================================================

                Section::make('المنتجات داخل الطلب')
                    ->description('المنتجات التي تم طلبها')
                    ->icon('heroicon-o-cube')
                    ->schema([

                        Repeater::make('items')
                            ->relationship()
                            ->label('')

                            ->schema([

                                TextInput::make('product_name')
                                    ->label('المنتج')
                                    ->disabled()
                                    ->dehydrated(false),

                                TextInput::make('price')
                                    ->label('السعر')
                                    ->disabled()
                                    ->dehydrated(false)
                                    ->suffix('ج.م'),

                                TextInput::make('quantity')
                                    ->label('الكمية')
                                    ->disabled()
                                    ->dehydrated(false),

                                TextInput::make('total')
                                    ->label('الإجمالي')
                                    ->disabled()
                                    ->dehydrated(false)
                                    ->suffix('ج.م'),

                            ])

                            ->columns(4)

                            // منع إضافة منتج
                            ->addable(false)

                            // منع حذف منتج
                            ->deletable(false)

                            // منع إعادة ترتيب المنتجات
                            ->reorderable(false)

                            // عدم عمل Collapse
                            ->collapsible(false),

                    ]),


                // =====================================================
                // بيانات العميل
                // =====================================================

                Section::make('بيانات العميل')
                    ->description('بيانات صاحب الطلب')
                    ->icon('heroicon-o-user')
                    ->schema([

                        TextInput::make('first_name')
                            ->label('الاسم الأول')
                            ->disabled(),

                        TextInput::make('last_name')
                            ->label('اسم العائلة')
                            ->disabled(),

                        TextInput::make('email')
                            ->label('البريد الإلكتروني')
                            ->disabled(),

                        TextInput::make('phone')
                            ->label('رقم الهاتف')
                            ->disabled(),

                    ])
                    ->columns(2),


                // =====================================================
                // عنوان الشحن
                // =====================================================

                Section::make('عنوان الشحن')
                    ->description('العنوان المسجل للطلب')
                    ->icon('heroicon-o-map-pin')
                    ->schema([

                        TextInput::make('country')
                            ->label('الدولة')
                            ->disabled(),

                        TextInput::make('governorate')
                            ->label('المحافظة')
                            ->disabled(),

                        TextInput::make('city')
                            ->label('المدينة')
                            ->disabled(),

                        TextInput::make('area')
                            ->label('المنطقة')
                            ->disabled(),

                        TextInput::make('postal_code')
                            ->label('الرمز البريدي')
                            ->disabled(),

                        TextInput::make('address')
                            ->label('العنوان بالتفصيل')
                            ->disabled()
                            ->columnSpanFull(),

                    ])
                    ->columns(2),


                // =====================================================
                // الحساب
                // =====================================================

                Section::make('ملخص الحساب')
                    ->description('تفاصيل قيمة الطلب')
                    ->icon('heroicon-o-banknotes')
                    ->schema([

                        TextInput::make('subtotal')
                            ->label('المجموع الفرعي')
                            ->disabled()
                            ->suffix('ج.م'),

                        TextInput::make('shipping')
                            ->label('الشحن')
                            ->disabled()
                            ->suffix('ج.م'),

                        TextInput::make('discount')
                            ->label('الخصم')
                            ->disabled()
                            ->suffix('ج.م'),

                        TextInput::make('total')
                            ->label('الإجمالي النهائي')
                            ->disabled()
                            ->suffix('ج.م'),

                    ])
                    ->columns(4),


                // =====================================================
                // الدفع
                // =====================================================

                Section::make('بيانات الدفع')
                    ->description('طريقة الدفع وإثبات الدفع')
                    ->icon('heroicon-o-credit-card')
                    ->schema([

                        Select::make('payment_method')
                            ->label('طريقة الدفع')
                            ->options([
                                'cash' => 'الدفع عند الاستلام',
                                'card' => 'بطاقة بنكية',
                                'vodafone_cash' => 'فودافون كاش',
                                'instapay' => 'إنستا باي',
                            ])
                            ->native(false)
                            ->disabled(),

                        FileUpload::make('payment_image')
                            ->label('إثبات الدفع')
                            ->image()
                            ->disk('public')
                            ->directory('orders/payments')
                            ->disabled(),

                    ])
                    ->columns(2),


                // =====================================================
                // الملاحظات
                // =====================================================

                Section::make('ملاحظات الطلب')
                    ->description('ملاحظات العميل')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->schema([

                        Textarea::make('notes')
                            ->label('الملاحظات')
                            ->disabled()
                            ->rows(5)
                            ->columnSpanFull(),

                    ]),

            ]);
    }
}