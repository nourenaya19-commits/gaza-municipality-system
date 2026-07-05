<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
  Schema::create('locations', function (Blueprint $table) {
    $table->id();
    $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
    $table->string('aisle_number');
    $table->string('rack_number');
    $table->string('bin_number');
    $table->integer('capacity');
    $table->timestamps();
});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
