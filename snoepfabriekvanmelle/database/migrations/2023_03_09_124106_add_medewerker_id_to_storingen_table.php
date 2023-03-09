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
        Schema::table('storingen', function (Blueprint $table) {
            $table->foreignId('medewerker_id')->references('id')->on('medewerkers');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('storingen', function (Blueprint $table) {
            //
        });
    }
};
