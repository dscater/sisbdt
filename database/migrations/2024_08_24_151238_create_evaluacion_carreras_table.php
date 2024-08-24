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
        Schema::create('evaluacion_carreras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("evaluacion_id");
            $table->string("titulo");
            $table->string("carrera");
            $table->string("institucion");
            $table->string("nivel");
            $table->date("fecha_titulo");
            $table->string("estado");
            $table->string("disciplina");
            $table->timestamps();

            $table->foreign("evaluacion_id")->on("evaluacions")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluacion_carreras');
    }
};
