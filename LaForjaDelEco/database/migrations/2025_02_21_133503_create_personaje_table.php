<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('personaje', function (Blueprint $table) {
            $table->id();
            $table->string('nombrePersonaje', 45)->nullable();
            $table->string('email', 45)->unique();
            $table->string('password', 45);
            $table->string('imagen', 250)->nullable();
            $table->string('rubies', 45)->nullable();
            $table->foreignId('caracteristicas_id')->constrained('caracteristicas')->onDelete('cascade');
            $table->foreignId('master_id')->constrained('master')->onDelete('cascade');
            $table->foreignId('inventario_id')->constrained('inventario')->onDelete('cascade')->unique();
            $table->string('Mderecha', 45)->nullable();
            $table->string('Mizquierda', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('personaje');
    }
};
