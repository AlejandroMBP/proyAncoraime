<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Funcionario;
use App\Models\PrestamoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class prestamosController extends Controller
{
    public function index()
    {
        $nombreDocumento = Documento::all();
        $documentos = PrestamoDocumento::all();
        $funcionario = Funcionario::all();
        return view('Administrador.prestamos.index', compact('documentos', 'funcionario', 'nombreDocumento'));
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
        dd($request->all());
        $rules = [
            'hojaRuta' => 'required',
            'documento' => 'required',
            'fechaPrestamoHidden' => 'required|date',
            'funcionario_id' => 'required',
            'fechaDevolucion' => 'required|date|after_or_equal:' . Carbon::today()->toDateString(),
            'descripcion' => 'required',
        ];

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
        try {
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
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hubo un error al registrar el préstamo: ' .  $e->getMessage())->withInput();
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
        try {
            $request->validate([
                'fecha_devolucion' => 'required|date|after_or_equal:' . Carbon::today()->toDateString(),
            ], [
                'fecha_devolucion.after_or_equal' => 'Este campo no puede ser una fecha inferior a la actual.',
            ]);

            $prestamo = PrestamoDocumento::findOrFail($id);
            $prestamo->fecha_devolucion = $request->fecha_devolucion;
            $prestamo->save();

            return response()->json(['success' => true, 'message' => 'Fecha de devolución actualizada con éxito.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Ocurrió un error al actualizar la fecha de devolución: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $prestamo = PrestamoDocumento::with(['funcionario', 'documento'])->findOrFail($id);

            return response()->json([
                'hoja_ruta' => $prestamo->hoja_ruta,
                'fecha_prestamo' => $prestamo->fecha_prestamo,
                'funcionario' => $prestamo->funcionario,
                'fecha_devolucion' => $prestamo->fecha_devolucion,
                'descripcion' => $prestamo->descripcion,
                'estado' => $prestamo->estado,
                'devolucion' => $prestamo->devolucion,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'No se pudo obtener el préstamo.'], 500);
        }
    }
    public function cambioEstado($id)
    {
        try {
            $prestamo = PrestamoDocumento::FindOrFail($id);
            $prestamo->estado = ($prestamo->estado == 1) ? 0 : 1;
            $prestamo->save();
            return redirect()->route('prestamos.index')->with('success', 'eliminacion exitosa');
        } catch (\Throwable $th) {
            return redirect()->route('prestamos.index')->with('error', 'algo salio mal');
        }
    }
}
