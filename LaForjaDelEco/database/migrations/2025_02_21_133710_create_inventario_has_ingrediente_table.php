<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('inventario_has_ingrediente', function (Blueprint $table) {
            $table->foreignId('inventario_id')->constrained('inventario')->onDelete('cascade');
            $table->foreignId('ingrediente_id')->constrained('ingrediente')->onDelete('cascade');
            $table->string('cantidad', 45)->nullable();
            $table->primary(['inventario_id', 'ingrediente_id']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('inventario_has_ingrediente');
    }
};