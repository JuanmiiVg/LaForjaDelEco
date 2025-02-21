<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('inventario_has_materiales', function (Blueprint $table) {
            $table->foreignId('Inventario_idInventario')->constrained('inventarios')->onDelete('cascade');
            $table->foreignId('Materiales_idMateriales')->constrained('materiales')->onDelete('cascade');
            $table->string('cantidad', 45)->nullable();
            $table->primary(['Inventario_idInventario', 'Materiales_idMateriales']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('inventario_has_materiales');
    }
};