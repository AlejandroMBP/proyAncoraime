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
            $table->bigInteger('hoja_ruta');
            $table->string('titulo');
            $table->string('documento_pdf');
            $table->date('fecha');
            $table->unsignedBigInteger('categoria_id');
            $table->bigInteger('cantidad_fojas');
            $table->string('codigo_qr');
            $table->string('ubicacion');
            $table->bigInteger('numero_carpeta');
            $table->text('detalles');

            $table->string('estado',30);  
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();
            // Convertir a clave foránea  
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
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
