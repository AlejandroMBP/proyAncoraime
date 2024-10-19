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
        Schema::create('tipos_documentos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->string('estado')->default(1); //cambio de estado 1 activo 0 inactivo por defecto 1
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();
            //clave foranea
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_documentos');
    }
};
