<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('materiales', function (Blueprint $table) {
            $table->id('idmateriales');
            $table->string('nombre', 45)->nullable();
            $table->string('imagen', 45)->nullable();
            $table->string('peso', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('materiales');
    }
};
