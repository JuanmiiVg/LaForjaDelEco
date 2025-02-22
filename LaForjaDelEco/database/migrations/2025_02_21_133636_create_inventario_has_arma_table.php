<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('inventario_has_arma', function (Blueprint $table) {
            $table->foreignId('inventario_id')->constrained('inventario')->onDelete('cascade');
            $table->foreignId('arma_id')->constrained('arma')->onDelete('cascade');
            $table->string('cantidad', 45)->nullable();
            $table->primary(['inventario_id', 'arma_id']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('inventario_has_arma');
    }
};