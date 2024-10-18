<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documentos';

    protected $fillable = [
        'hoja_ruta',
        'titulo',
        'documento_pdf',
        'fecha',
        'ubicacion',
        'tipo_documento_id',
        'cantidad_fojas',
        'codigo_qr',
        'numero_carpeta',
        'descripcion',
        'usuario_id',
    ];

    /**
     * Relación con el modelo TipoDocumento.
     * Un documento pertenece a un tipo de documento.
     */
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }

    /**
     * Relación con el modelo User (usuarios).
     * Un documento pertenece a un usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
