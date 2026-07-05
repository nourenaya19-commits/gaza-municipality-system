<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::create('items', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->decimal('price', 10, 2)->default(0); // السعر هنا
        $table->integer('quantity')->default(0);     // الكمية هنا
        $table->foreignId('store_id')->constrained()->onDelete('cascade');
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->foreignId('unit_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
