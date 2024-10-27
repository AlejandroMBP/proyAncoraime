<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Funcionario;
use App\Models\ImpresionDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class impresionesController extends Controller
{
    public function index()
    {
        $documentos = Documento::all();
        $funcionario = Funcionario::all();
        $impresiones = ImpresionDocumento::all();
        return view('Administrador.impresiones.index', compact('documentos', 'funcionario', 'impresiones'));
    }
    public function buscarDocumento(Request $request)
    {
        $query = $request->get('query');
        $documentos = Documento::where('titulo', 'LIKE', "%{$query}%")->get(['id', 'titulo']);
        return response()->json($documentos);
    }
    public function buscarFuncionario(Request $request)
    {
        $query = $request->get('query');
        $funcionarios = Funcionario::where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('paterno', 'LIKE', "%{$query}%")
            ->orWhere('materno', 'LIKE', "%{$query}%")
            ->get();
        return response()->json($funcionarios);
    }
    public function store(Request $request)
    {
        try {
            // Validación de los datos
            $validatedData = $request->validate([
                'hojaRuta' => 'required|integer',
                'Documento' => 'required|exists:documentos,id',
                'funcionario' => 'required|exists:funcionarios,id',
                'autoridad' => 'required|string|max:60',
                'Descripcion' => 'required|string',
                'fecha_entrega' => 'nullable|date',
            ]);

            // Creación del registro
            $impresion = ImpresionDocumento::create([
                'hoja_ruta' => $validatedData['hojaRuta'],
                'documento_id' => $validatedData['Documento'],
                'fecha_impresion' => now(),
                'funcionario_id' => $validatedData['funcionario'],
                'nombreCompleto_autoridad' => $validatedData['autoridad'],
                'detalles_autoridad' => '',
                'fecha_entrega' => now(),
                'descripcion' => $validatedData['Descripcion'],
                'estado' => 1,
                'usuario_id' => auth()->id(),
            ]);

            // Retornar respuesta de éxito
            return response()->json(['redirect' => route('impresiones.index')]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Verificar si el error es debido a la falta de Documento o Funcionario
            if ($e->validator->errors()->has('Documento')) {
                return response()->json(['error' => 'El documento seleccionado no existe en la base de datos.'], 422);
            }

            if ($e->validator->errors()->has('funcionario')) {
                return response()->json(['error' => 'El funcionario seleccionado no existe en la base de datos.'], 422);
            }

            // Retornar cualquier otro error de validación
            return response()->json(['error' => 'Error de validación en los datos ingresados.'], 422);
        } catch (\Exception $e) {
            // Manejar cualquier otro error inesperado
            return response()->json(['error' => 'Ocurrió un error al procesar la solicitud.'], 500);
        }
    }

    public function cambioEstado($id)
    {
        try {
            // Buscar la impresión por ID
            $impresion = ImpresionDocumento::findOrFail($id);

            // Cambiar el estado a 0 (eliminación lógica)
            $impresion->estado = 0;
            $impresion->save();

            // Redirigir con mensaje de éxito
            return redirect()->route('impresiones.index')->with('success', 'Impresión eliminada correctamente.');
        } catch (\Exception $e) {
            // Manejar cualquier error que ocurra
            return redirect()->route('impresiones.index')->with('error', 'Ocurrió un error al intentar eliminar la impresión: ' . $e->getMessage());
        }
    }
    public function imprimir($id)
    {
        // Encontrar el documento por ID
        $documento = Documento::findOrFail($id);

        // Construir la ruta completa al archivo
        $filePath = storage_path('app/public/' . $documento->documento_pdf);

        // Dump de la ruta del archivo para verificar
        //dd($filePath); // Esto mostrará la ruta completa en el navegador y detendrá la ejecución

        // Verificar si el archivo existe en el almacenamiento
        if (file_exists($filePath)) {
            // Devolver el archivo PDF para verlo en el navegador
            return response()->file($filePath);
        }

        return redirect()->back()->with('error', 'El documento no se encuentra en el sistema.');
    }
}
