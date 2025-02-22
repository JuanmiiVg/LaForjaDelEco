<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('inventario_has_material', function (Blueprint $table) {
            $table->foreignId('inventario_id')->constrained('inventario')->onDelete('cascade');
            $table->foreignId('material_id')->constrained('material')->onDelete('cascade');
            $table->string('cantidad', 45)->nullable();
            $table->primary(['inventario_id', 'material_id']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('inventario_has_material');
    }
};