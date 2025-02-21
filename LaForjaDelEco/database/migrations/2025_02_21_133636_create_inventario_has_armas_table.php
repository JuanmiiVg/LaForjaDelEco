<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('inventario_has_arma', function (Blueprint $table) {
            $table->foreignId('Inventario_idInventario')->constrained('inventarios')->onDelete('cascade');
            $table->foreignId('Arma_idArmas')->constrained('armas')->onDelete('cascade');
            $table->string('cantidad', 45)->nullable();
            $table->primary(['Inventario_idInventario', 'Arma_idArmas']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('inventario_has_arma');
    }
};