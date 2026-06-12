<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('predicciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->foreignId('partido_id')->constrained('partidos')->onDelete('cascade');

            $table->integer('goles_local_prediccion');
            $table->integer('goles_visitante_prediccion');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('predicciones');
    }
};