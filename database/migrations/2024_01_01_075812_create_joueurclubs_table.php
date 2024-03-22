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
        Schema::create('joueurclub', function (Blueprint $table) {
            $table->id('idjoueurclub');
            $table->unsignedBigInteger('idjoueur');
            $table->unsignedBigInteger('idclub');
            $table->date('datedebutcontrat');
            $table->date('datefin');
            $table->tinyInteger('etat')->default(0); 
            $table->timestamps();
    
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joueurclubs');
    }
};
