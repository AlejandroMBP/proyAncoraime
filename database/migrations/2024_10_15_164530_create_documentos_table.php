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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->integer('hoja_ruta');
            $table->string('titulo');
            $table->string('documento_pdf');
            $table->date('fecha');
            $table->string('ubicacion');
            $table->unsignedBigInteger('tipo_documento_id');
            $table->integer('cantidad_fojas');
            $table->string('codigo_qr');
            $table->integer('numero_carpeta');
            $table->text('descripcion');

            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();
            // Convertir a clave foránea  
            $table->foreign('tipo_documento_id')->references('id')->on('tipos_documentos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
