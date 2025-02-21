<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('inventario_has_ingredientes', function (Blueprint $table) {
            $table->foreignId('Inventario_idInventario')->constrained('inventarios')->onDelete('cascade');
            $table->foreignId('Ingredientes_idIngredientes')->constrained('ingredientes')->onDelete('cascade');
            $table->string('cantidad', 45)->nullable();
            $table->primary(['Inventario_idInventario', 'Ingredientes_idIngredientes']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('inventario_has_ingredientes');
    }
};