<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Funcionario;
use App\Models\PrestamoDocumento;
use Illuminate\Http\Request;

class prestamosController extends Controller
{
    public function index()
    {
        $documentos = PrestamoDocumento::all();
        return view('Administrador.prestamos.index',compact('documentos'));
    }
    public function buscar(Request $request) {
        $query = $request->input('query');
        $documentos = Documento::where('titulo', 'LIKE', "%{$query}%")->get();
        return response()->json($documentos);
    }
    public function buscarfuncionario(Request $request){
        $query= $request->input('query');
        $funcionario = Funcionario::where('nombre','LIKE',"%{$query}%")
        ->orWhere('paterno','LIKE',"%{$query}%")
        ->orWhere('materno','LIKE',"%{$query}%")
        ->get();
        return response()->json($funcionario);
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'documento' => 'required|exists:documentos,titulo', // Verifica que el documento existe
            'fechaPrestamo' => 'required|date',
            'fechaDevolucion' => 'nullable|date',
            'hojaRuta' => 'required|integer',
            'Funcionario' => 'required|exists:funcionarios,nombre', // Verifica que el funcionario existe
            'descripcion' => 'required|string|max:255',
        ]);

        // Buscar el ID del documento por su título
        $documento = Documento::where('titulo', $request->documento)->first();

        // Buscar el ID del funcionario por su nombre
        $funcionario = Funcionario::where('nombre', $request->Funcionario)->first();

        // Crear un nuevo préstamo de documento
        PrestamoDocumento::create([
            'hoja_ruta' => $validated['hojaRuta'],
            'documento_id' => $documento->id,
            'fecha_prestamo' => $validated['fechaPrestamo'],
            'funcionario_id' => $funcionario->id,
            'fecha_devolucion' => $validated['fechaDevolucion'],
            'descripcion' => $validated['descripcion'],
            'usuario_id' => auth()->id(),  // ID del usuario actual
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('prestamos.index')->with('success', 'Préstamo creado correctamente.');
    }

}