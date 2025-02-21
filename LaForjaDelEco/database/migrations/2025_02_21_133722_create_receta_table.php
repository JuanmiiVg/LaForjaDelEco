<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('recetas', function (Blueprint $table) {
            $table->foreignId('Pocion_idPocion')->constrained('pociones')->onDelete('cascade');
            $table->foreignId('Ingredientes_idIngredientes')->constrained('ingredientes')->onDelete('cascade');
            $table->primary(['Pocion_idPocion', 'Ingredientes_idIngredientes']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('recetas');
    }
};