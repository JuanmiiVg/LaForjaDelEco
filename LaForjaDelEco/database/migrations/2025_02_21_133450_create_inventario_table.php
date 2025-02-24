<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->string('cargaMax', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('inventario');
    }
};


