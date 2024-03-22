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
        Schema::create('divisionclub', function (Blueprint $table) {
            $table->id('iddivisionclub');
            $table->unsignedBigInteger('idas');
            $table->unsignedBigInteger('iddivision');
            $table->unsignedBigInteger('idclub');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('divisionclubs');
    }
};
