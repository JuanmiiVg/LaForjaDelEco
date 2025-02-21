<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('pociones', function (Blueprint $table) {
            $table->id('idPocion');
            $table->string('nombre', 45)->nullable();
            $table->string('imagen', 45)->nullable();
            $table->string('duracion', 45)->nullable();
            $table->string('efecto', 255)->nullable();
            $table->string('tamaño', 45)->nullable();
            $table->string('receta', 45)->nullable();
            $table->string('peso', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('pociones');
    }
};