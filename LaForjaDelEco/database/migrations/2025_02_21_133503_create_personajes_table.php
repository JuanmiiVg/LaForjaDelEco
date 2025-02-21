<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('personajes', function (Blueprint $table) {
            $table->id('idPersonaje');
            $table->string('nombrePersonaje', 45)->nullable();
            $table->string('email', 45)->unique();
            $table->string('password', 45);
            $table->string('imagen', 45)->nullable();
            $table->string('rubies', 45)->nullable();
            $table->foreignId('idCaracteristicas')->constrained('caracteristicas')->onDelete('cascade');
            $table->foreignId('Master_idMaster')->constrained('masters')->onDelete('cascade');
            $table->foreignId('Inventario_idInventario')->constrained('inventarios')->onDelete('cascade')->unique();
            $table->string('Mderecha', 45)->nullable();
            $table->string('Mizquierda', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('personajes');
    }
};
