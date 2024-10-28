<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class tipoDocumentoController extends Controller
{
    public function index()
    {
        $tipoDocumento = TipoDocumento::all();
        return view('Administrador.tipo_documentos.index', compact('tipoDocumento'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'descripcion' => 'required|string|min:4|max:150|regex:/^[a-zA-Z0-9\s]+$/',
        ]);

        TipoDocumento::create([
            'descripcion' => $validate['descripcion'],
            'estado' => 1,
            'usuario_id' => auth()->id(),
        ]);

        // return response()->json(['success' => true, 'message' => 'Creado exitosamente']);
        return response()->json(['success' => true, 'message' => 'Creado exitosamente']);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'descripcion' => 'required|string|min:4|max:150|regex:/^[a-zA-Z0-9\s]+$/',
        ]);
        $tipoDocumento = TipoDocumento::findOrFail($id);
        $tipoDocumento->update([
            'descripcion' => $validated['descripcion'],
        ]);
        return response()->json(['success' => true, 'message' => 'Tipo de Documento actualizado correctamente.']);
    }

    public function cambioEstado($id)
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);
        try {
            if ($tipoDocumento->estado == 1) {
                $tipoDocumento->estado = 0;
            } else {
                $tipoDocumento->estado = 1;
            }
            $tipoDocumento->save();

            return response()->json(['success' => true, 'message' => 'Eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar.'], 500);
        }
    }
}
