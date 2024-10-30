<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamoDocumento extends Model
{
    use HasFactory;


    protected $table = 'prestamos_documentos';

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
        'estado' => '1',
        'devolucion' => 'no',
    ];

    public function documento()
    {
        return $this->belongsTo(Documento::class, 'documento_id');
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
