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
        Schema::create('parametrizacions', function (Blueprint $table) {
            $table->id();
            $table->float("primaria");
            $table->float("secundaria");
            $table->float("bachiller");
            $table->float("titulado");
            $table->float("egresado");
            $table->float("en_curso");
            $table->float("tecnico_superior");
            $table->float("tecnico_medio");
            $table->float("disciplina_ingenieria");
            $table->float("doctorado");
            $table->float("maestria");
            $table->float("especialidad");
            $table->float("diplomado");
            $table->float("c_carga_horaria");
            $table->float("p_cada_mes");
            $table->float("p_cada_reconocimiento");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametrizacions');
    }
};
