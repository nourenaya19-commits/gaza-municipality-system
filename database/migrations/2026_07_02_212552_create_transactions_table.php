<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
{
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('item_id')->constrained('items');
        $table->foreignId('user_id')->constrained('users');
        $table->foreignId('store_id')->constrained('stores');
        $table->foreignId('location_id')->constrained('locations');
        $table->string('type');
        $table->integer('quantity');
        $table->text('notes')->nullable();
        $table->timestamp('transaction_date');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
