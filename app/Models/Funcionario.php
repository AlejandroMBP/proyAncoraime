<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    // Definir la tabla asociada a este modelo (opcional si sigue la convención de nombres de Laravel)
    protected $table = 'funcionarios';

    // Definir los campos que pueden ser asignados en masa
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
        'usuario_id'
    ];

    // Definir las relaciones con otros modelos

    // Relación con el modelo Cargo (muchos funcionarios pertenecen a un cargo)
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }

    // Relación con el modelo User (muchos funcionarios pueden estar relacionados con un usuario)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}