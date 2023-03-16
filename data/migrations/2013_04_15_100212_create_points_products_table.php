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
        Schema::create('points_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('point_id')->references('id')->on('points')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points_products');
    }
};
