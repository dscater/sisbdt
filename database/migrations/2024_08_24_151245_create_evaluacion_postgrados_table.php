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
        Schema::create('evaluacion_postgrados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("evaluacion_id");
            $table->string("institucion");
            $table->date("fecha_postgrado");
            $table->string("titulo");
            $table->string("nivel");
            $table->string("postgrado");
            $table->timestamps();

            $table->foreign("evaluacion_id")->on("evaluacions")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluacion_postgrados');
    }
};
