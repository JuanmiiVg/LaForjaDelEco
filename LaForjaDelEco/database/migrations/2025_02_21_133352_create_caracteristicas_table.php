<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('caracteristicas', function (Blueprint $table) {
            $table->id('idCaracteristicas');
            $table->integer('vigor')->nullable();
            $table->integer('aguante')->nullable();
            $table->integer('fuerza')->nullable();
            $table->integer('destreza')->nullable();
            $table->integer('inteligencia')->nullable();
            $table->integer('arcano')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('caracteristicas');
    }
};