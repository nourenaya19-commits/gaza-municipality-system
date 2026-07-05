<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('stores', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // اسم المخزن
        $table->string('address_location')->nullable(); // الموقع
        $table->unsignedBigInteger('manager_id')->nullable(); // المسؤول (سيرتبط لاحقاً بالمستخدمين)
        $table->string('status')->default('active'); // حالة المخزن
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
