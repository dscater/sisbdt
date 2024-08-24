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
        Schema::create('evaluacion_cursos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("evaluacion_id");
            $table->string("nombre");
            $table->string("institucion");
            $table->date("fecha");
            $table->float("carga_horaria");
            $table->timestamps();

            $table->foreign("evaluacion_id")->on("evaluacions")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluacion_cursos');
    }
};
