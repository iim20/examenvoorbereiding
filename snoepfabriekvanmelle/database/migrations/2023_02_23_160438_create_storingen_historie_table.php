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
        Schema::create('storingen_historie', function (Blueprint $table) {
            $table->id();
            $table->string('oorzaak');
            $table->string('oplossing');
            $table->date('date');
            $table->foreignId('medewerker_id')->references('id')->on('medewerkers');
            $table->foreignId('machine_id')->references('id')->on('machines');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storingen_historie');
    }
};
