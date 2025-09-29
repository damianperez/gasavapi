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
            $table->string("Nro_socio")->nullable(); //->primary(); 
            $table->string("Apellido y nombre")->nullable();
            $table->string("Lugar de pago")->nullable();
            $table->string("Actividad")->nullable();
            $table->string("Domicilio")->nullable();
            $table->string("telefono 1")->nullable();
            $table->string("telefono 2")->nullable();
            $table->string("E-Mail")->nullable();;
            $table->string("Pago hasta")->nullable();;
            $table->string("Estado")->nullable();;
            $table->date("Fecha de alta")->nullable();
            $table->date("Fecha de baja")->nullable();
            $table->text("Observaciones")->nullable();
            $table->string("Antiguedad")->nullable();
            $table->text("Observaciones Comision Directiva")->nullable();


            $table->bigInteger('id_tg')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
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
