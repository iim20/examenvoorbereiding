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
        Schema::create('storingen', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->foreignId('machine_id')->references('id')->on('machines')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('statusniveau_id')->references('id')->on('statusniveau');
            $table->foreignId('statusupdate_id')->references('id')->on('statusupdate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storingen');
    }
};
