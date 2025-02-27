<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombrePersonaje', 45)->nullable();  
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable() ;
            $table->string('imagen', 500)->nullable();
            $table->string('rubies', 45)->nullable();
            $table->foreignId('caracteristicas_id')->constrained('caracteristicas')->onDelete('cascade');
            $table->foreignId('master_id')->constrained('master')->onDelete('cascade');
            $table->foreignId('inventario_id')->constrained('inventario')->onDelete('cascade')->unique();
            $table->string('Mderecha', 45)->nullable();
            $table->string('Mizquierda', 45)->nullable();
            
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
/*<?php

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
*/ 