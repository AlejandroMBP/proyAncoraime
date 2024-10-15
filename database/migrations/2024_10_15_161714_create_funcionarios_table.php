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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',40);
            $table->string('paterno',35);
            $table->string('materno',35);
            $table->string('ci',40);
            $table->date('fecha_nacimiento');
            $table->string('celular',20);
            $table->unsignedBigInteger('cargo_id');
            $table->string('unidad',40);
            $table->text('descripcion');

            $table->string('estado',30);  
            $table->unsignedBigInteger('usuario_id'); 
            $table->timestamps();
            
            // Define el campo que será la clave foránea
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
