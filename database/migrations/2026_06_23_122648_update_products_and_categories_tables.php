<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('sale_price', 10, 2)->nullable()->after('price');

            $table->boolean('is_new')
                ->default(false)
                ->after('images');

            $table->boolean('is_featured')
                ->default(false)
                ->after('is_new');

            $table->boolean('status')
                ->default(true)
                ->after('is_featured');
        });

        Schema::table('product_categories', function (Blueprint $table) {
            $table->string('image')
                ->nullable()
                ->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'sale_price',
                'is_new',
                'is_featured',
                'status',
            ]);
        });

        Schema::table('product_categories', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};