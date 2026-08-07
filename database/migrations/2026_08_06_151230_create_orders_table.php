<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('orders', function (Blueprint $table) {

        $table->id();

        $table->string('order_number')->unique();

        // بيانات العميل
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email');
        $table->string('phone');

        // العنوان
        $table->string('country')->default('مصر');
        $table->string('city');
        $table->string('area');
        $table->string('address');
        $table->string('postal_code')->nullable();

        // الأسعار
        $table->decimal('subtotal',10,2);
        $table->decimal('shipping',10,2)->default(0);
        $table->decimal('discount',10,2)->default(0);
        $table->decimal('total',10,2);

        // حالة الطلب
        $table->enum('status',[
            'pending',
            'confirmed',
            'shipping',
            'completed',
            'cancelled'
        ])->default('pending');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
