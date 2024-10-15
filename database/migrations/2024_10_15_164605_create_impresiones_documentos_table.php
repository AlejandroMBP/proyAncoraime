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
        Schema::create('impresiones_documentos', function (Blueprint $table) {
            $table->id();
            $table->integer('hoja_ruta');
            $table->unsignedBigInteger('documento_id');
            $table->dateTime('fecha_impresion');
            $table->unsignedBigInteger('funcionario_id');
            $table->string('nombreCompleto_autoridad', 60);
            $table->string('detalles_autoridad');
            $table->dateTime('fecha_entrega')->nullable();
            $table->text('descripcion');
            $table->string('estado');

            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();
            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('impresiones_documentos');
    }
};
