<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('fabricacion', function (Blueprint $table) {
            $table->foreignId('arma_id')->constrained('arma')->onDelete('cascade');
            $table->foreignId('material_id')->constrained('material')->onDelete('cascade');
            $table->primary(['arma_id', 'material_id']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('fabricacion');
    }
};