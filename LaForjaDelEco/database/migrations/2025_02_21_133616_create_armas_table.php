<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('armas', function (Blueprint $table) {
            $table->id('idArmas');
            $table->string('nombre', 45)->nullable();
            $table->string('imagen', 45)->nullable();
            $table->string('categoria', 45)->nullable();
            $table->string('tamaño', 45)->nullable();
            $table->string('daño', 45)->nullable();
            $table->string('peso', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('armas');
    }
};