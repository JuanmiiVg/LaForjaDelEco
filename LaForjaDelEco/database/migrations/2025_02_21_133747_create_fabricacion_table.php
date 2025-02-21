<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('fabricacion', function (Blueprint $table) {
            $table->foreignId('Arma_idArmas')->constrained('armas')->onDelete('cascade');
            $table->foreignId('Materiales_idMateriales')->constrained('materiales')->onDelete('cascade');
            $table->primary(['Arma_idArmas', 'Materiales_idMateriales']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('fabricacion');
    }
};