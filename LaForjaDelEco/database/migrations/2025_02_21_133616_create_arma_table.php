<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('arma', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45)->nullable();
            $table->string('imagen', 250)->nullable();
            $table->string('categoria', 45)->nullable();
            $table->string('tamano', 45)->nullable();
            $table->string('dano', 45)->nullable();
            $table->string('peso', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('arma');
    }
};