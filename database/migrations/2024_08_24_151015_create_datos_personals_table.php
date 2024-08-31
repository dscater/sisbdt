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
        Schema::create('datos_personals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("tipo_ci");
            $table->string("nro_ci");
            $table->date("fecha_nacimiento");
            $table->string("lugar_nacimiento", 600);
            $table->string("genero");
            $table->string("foto", 255)->nullable();
            $table->string("fono");
            $table->string("dir");
            $table->string("hoja_vida", 255)->nullable();
            $table->double("calificacion")->default(0);
            $table->date("fecha_registro")->nullable();
            $table->timestamps();

            $table->foreign("user_id")->on("users")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_personals');
    }
};
