<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('receta', function (Blueprint $table) {
            $table->foreignId('pocion_id')->constrained('pocion')->onDelete('cascade');
            $table->foreignId('ingrediente_id')->constrained('ingrediente')->onDelete('cascade');
            $table->primary(['pocion_id', 'ingrediente_id']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('receta');
    }
};