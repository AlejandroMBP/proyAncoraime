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
        Schema::create('prestamos_documentos', function (Blueprint $table) {
            $table->id();
            $table->integer('hoja_ruta');
            $table->unsignedBigInteger('documento_id');
            $table->date('fecha_prestamo');
            $table->unsignedBigInteger('funcionario_id');
            $table->date('fecha_devolucion')->nullable();
            $table->text('descripcion');
            $table->string('devolucion')->default('no');
            $table->integer('estado')->default(1);
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();
            // Establecer la clave foránea
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
        Schema::dropIfExists('prestamos_documentos');
    }
};
