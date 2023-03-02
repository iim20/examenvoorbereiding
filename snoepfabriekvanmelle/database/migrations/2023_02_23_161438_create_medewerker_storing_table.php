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
        Schema::create('medewerker_storing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medewerker_id')->references('id')->on('medewerkers');
            $table->foreignId('storing_id')->references('id')->on('storingen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medewerker_storing');
    }
};
