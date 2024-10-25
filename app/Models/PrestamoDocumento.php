<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamoDocumento extends Model
{
    use HasFactory;

    // Definir la tabla asociada a este modelo (opcional si sigue la convención de nombres de Laravel)
    protected $table = 'prestamos_documentos';

    // Definir los campos que pueden ser asignados en masa
    protected $fillable = [
        'hoja_ruta',
        'documento_id',
        'fecha_prestamo',
        'funcionario_id',
        'fecha_devolucion',
        'descripcion',
        'devolucion',
        'estado',
        'usuario_id'
    ];
    protected $attributes = [
        'estado' => '1',       // Valor por defecto: 1 (puedes cambiarlo según lo necesites)
        'devolucion' => 'no',  // Valor por defecto: "no"
    ];
    // Definir las relaciones con otros modelos

    // Relación con el modelo Documento (muchos préstamos pueden estar relacionados con un documento)
    public function documento()
    {
        return $this->belongsTo(Documento::class, 'documento_id');
    }

    // Relación con el modelo Funcionario (muchos préstamos pueden estar relacionados con un funcionario)
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
    }

    // Relación con el modelo User (muchos préstamos pueden estar relacionados con un usuario)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}