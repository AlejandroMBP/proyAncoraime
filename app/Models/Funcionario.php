<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'ci',
        'fecha_nacimiento',
        'celular',
        'cargo_id',
        'unidad',
        'descripcion',
        'estado',
        'usuario_id',
    ];
}
