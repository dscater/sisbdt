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
        Schema::create('habilidads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("datos_otros_id");
            $table->string("habilidad", 600);
            $table->timestamps();

            $table->foreign("datos_otros_id")->on("datos_otros")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habilidads');
    }
};
