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
        $funcionario = Funcionario::all();
        return view('Administrador.prestamos.index', compact('documentos', 'funcionario'));
    }
    public function buscar(Request $request)
    {
        $query = $request->input('query');
        $documentos = Documento::where('titulo', 'LIKE', "%{$query}%")->get();
        return response()->json($documentos);
    }
    public function buscarfuncionario(Request $request)
    {
        $query = $request->input('query');
        $funcionario = Funcionario::where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('paterno', 'LIKE', "%{$query}%")
            ->orWhere('materno', 'LIKE', "%{$query}%")
            ->get();
        return response()->json($funcionario);
    }

    public function store(Request $request)
    {
        // Obtener todos los datos del formulario
        $data = $request->all();

        // Buscar el documento por su título
        $documento = Documento::where('titulo', $data['documento'])->first();

        // Verificar si se encontró el documento
        if (!$documento) {
            return redirect()->back()->withErrors(['documento' => 'Documento no encontrado.'])->withInput();
        }

        // Obtener el ID del funcionario
        $funcionarioId = $request->input('funcionario_id');

        // Buscar el funcionario por ID
        $funcionario = Funcionario::find($funcionarioId);

        // Verificar si se encontró el funcionario
        if (!$funcionario) {
            return redirect()->back()->withErrors(['funcionario' => 'Funcionario no encontrado.'])->withInput();
        }

        // Verificación completa, continuar con el almacenamiento
        dd($funcionario);
    }

    public function update(Request $request, $id)
    {
        // Buscar el préstamo por su ID
        $prestamo = PrestamoDocumento::find($id);

        if (!$prestamo) {
            return redirect()->back()->withErrors(['prestamo' => 'Préstamo no encontrado.']);
        }

        // Cambiar el estado de devolución de forma más simple
        $prestamo->devolucion = $prestamo->devolucion === 'si' ? 'no' : 'si';

        // Guardar los cambios
        $prestamo->save();

        return redirect()->route('prestamos.index')->with('success', 'Estado actualizado correctamente.');
    }
}
