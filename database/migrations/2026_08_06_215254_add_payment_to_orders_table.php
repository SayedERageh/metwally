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
    Schema::table('orders', function (Blueprint $table) {

    $table->string('governorate')
        ->after('country');

    $table->string('payment_method')
        ->after('total');

    $table->string('payment_image')
        ->nullable()
        ->after('payment_method');

    $table->text('notes')
        ->nullable()
        ->after('payment_image');

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
