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
        Schema::create('impresiones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('hoja_ruta');
            $table->unsignedBigInteger('documento_id');
            $table->dateTime('fecha_impresion');
            $table->unsignedBigInteger('funcionario_id');
            $table->string('nombreCompleto_autoridad');
            $table->text('detalles_autoridad_comunidad');
            $table->dateTime('fecha_entrega')->nullable();;

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
        Schema::dropIfExists('impresiones');
    }
};
