<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('masters', function (Blueprint $table) {
            $table->id('idMaster');
            $table->string('nombreMaster', 45)->nullable();
            $table->string('email', 45)->unique();
            $table->string('password', 45);
            $table->string('imagen', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('masters');
    }
};