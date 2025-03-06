<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('master', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 6)->unique();
            $table->string('nombreMaster', 45)->nullable();
            $table->string('email', 45)->unique();
            $table->string('password', 250);
            $table->string('imagen', 250)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('master');
    }
};
