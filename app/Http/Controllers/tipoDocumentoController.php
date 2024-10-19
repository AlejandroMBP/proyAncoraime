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
            'descripcion' => 'required|string|max:255',
        ]);

        TipoDocumento::create([
            'descripcion' => $validate['descripcion'],
            'estado' => 1,
            'usuario_id' => auth()->id(),
        ]);

        return response()->json(['success' => true, 'message' => 'Creado exitosamente']);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        // Encontrar el tipo de documento por su ID
        $tipoDocumento = TipoDocumento::findOrFail($id);

        // Actualizar los datos
        $tipoDocumento->update([
            'descripcion' => $validated['descripcion'],
        ]);

        // Redirigir con un mensaje de éxito
        return response()->json(['success' => true, 'message' => 'Tipo de Documento actualizado correctamente.']);
    }


    public function cambioEstado(Request $request, $id)
    {
        // Encontrar el tipo de documento por su ID
        $tipoDocumento = TipoDocumento::findOrFail($id);

        // Cambiar el estado
        try {
            if ($tipoDocumento->estado == 1) {
                $tipoDocumento->estado = 0;
            } else {
                $tipoDocumento->estado = 1; // Cambia el estado de nuevo a 1 si es necesario
            }
            $tipoDocumento->save();

            return response()->json(['success' => true, 'message' => 'Eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar.'], 500);
        }
    }
}
