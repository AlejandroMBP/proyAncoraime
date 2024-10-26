<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Funcionario;
use App\Models\PrestamoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

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
     // Definir reglas de validación
    $rules = [
        'hojaRuta' => 'required',
        'documento' => 'required',
        'fechaPrestamoHidden' => 'required|date',
        'funcionario_id' => 'required',
        'fechaDevolucion' => 'required|date|after_or_equal:' . Carbon::today()->toDateString(),
        'descripcion' => 'required',
    ];

    // Mensajes de error personalizados
    $messages = [
        'hojaRuta.required' => 'El campo Hoja de Ruta es obligatorio.',
        'documento.required' => 'El campo Documento es obligatorio.',
        'fechaPrestamoHidden.required' => 'La fecha de préstamo es obligatoria.',
        'funcionario_id.required' => 'Debe seleccionar un Funcionario.',
        'fechaDevolucion.required' => 'La fecha de devolución es obligatoria.',
        'fechaDevolucion.after_or_equal' => 'La fecha de devolución debe ser hoy o una fecha futura.',
        'descripcion.required' => 'El campo Descripción es obligatorio.',
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
try{
    $documento = Documento::where('titulo', $request->input('documento'))->first();
    if (!$documento) {
        return redirect()->back()->withErrors(['documento' => 'El documento especificado no existe.']);
    }

    PrestamoDocumento::create([
        'hoja_ruta' => $request->input('hojaRuta'),
        'documento_id' => $documento->id,
        'fecha_prestamo' => $request->input('fechaPrestamoHidden'),
        'funcionario_id' => $request->input('funcionario_id'),
        'fecha_devolucion' => $request->input('fechaDevolucion'),
        'descripcion' => $request->input('descripcion'),
        'usuario_id' => auth()->id(),
    ]);

    return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado exitosamente.');
} catch(\Exception $e){
    return redirect()->back()->with('error', 'Hubo un error al registrar el préstamo: ' . $e->getMessage());
}
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
    public function actualizar(Request $request, $id)
{
    // Validar la fecha de devolución
    $request->validate([
        'fechaDevolucion' => 'required|date'
    ]);

    try {
        // Buscar el préstamo por ID
        $prestamo = PrestamoDocumento::findOrFail($id);

        // Actualizar la fecha de devolución
        $prestamo->fecha_devolucion = $request->input('fechaDevolucion');
        $prestamo->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('prestamos.index')->with('success', 'Fecha de devolución actualizada correctamente.');

    } catch (\Exception $e) {
        // Redirigir con mensaje de error si ocurre una excepción
        return redirect()->route('prestamos.index')->with('error', 'Hubo un error al actualizar la fecha de devolución.');
    }
}

}