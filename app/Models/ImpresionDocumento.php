<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpresionDocumento extends Model
{
    use HasFactory;

    protected $table = 'impresiones_documentos';

    protected $fillable = [
        'hoja_ruta',
        'documento_id',
        'fecha_impresion',
        'funcionario_id',
        'nombreCompleto_autoridad',
        'detalles_autoridad',
        'fecha_entrega',
        'descripcion',
        'estado',
        'usuario_id',
    ];

    // Relaciones
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
