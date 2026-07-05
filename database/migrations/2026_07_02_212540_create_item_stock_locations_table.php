<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::create('item_stock_locations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('item_id')->constrained('items');
        $table->foreignId('store_id')->constrained('stores');
        $table->foreignId('location_id')->constrained('locations');
        $table->integer('current_stock');
        $table->integer('quantity'); // الكمية الموجودة في هذا الموقع تحديداً
    $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_stock_locations');
    }
};
