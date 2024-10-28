<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Funcionario;
use App\Models\ImpresionDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use App\Helpers\PDF;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

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
        try {
            // Desencriptar el ID
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', 'ID inválido.');
        }
        // dd($id->id);
        // Encontrar el documento por ID
        $documento = Documento::findOrFail($id->id);

        // Construir la ruta completa al archivo
        $filePath = storage_path('app/public/' . $documento->documento_pdf);

        // Verificar si el archivo existe en el almacenamiento
        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'El archivo PDF no existe en el almacenamiento.');
        }

        // Crear una nueva instancia de tu clase PDF
        $pdf = new PDF();

        // Contar el número de páginas del PDF original
        $pageCount = $pdf->setSourceFile($filePath);

        // Iterar a través de todas las páginas
        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            // Importar la página
            $templateId = $pdf->importPage($pageNo);
            $pdf->AddPage();
            $pdf->useTemplate($templateId);

            // Agregar la marca de agua
            $pdf->SetAlpha(0.2); // Ajusta la transparencia
            $pdf->SetFont('Arial', 'B', 150);
            $pdf->SetTextColor(169, 169, 169); // Color rojo
            $this->RotatedText($pdf, 20, 150, 'COPIA', -45); // Llamar a RotatedText
            $pdf->SetAlpha(1.0); // Restablecer la opacidad a 1
        }

        // Output the PDF to the browser
        $pdf->Output('I', 'documento_con_marca_de_agua.pdf');
        exit; // Asegúrate de detener la ejecución después de enviar el PDF
    }


    // Método para rotar el texto
    private function RotatedText($pdf, $x, $y, $txt, $angle)
    {
        // Guardar la posición actual
        $pdf->SetXY($x, $y);

        // Rotar el texto
        $pdf->Rotate($angle, $x, $y);
        $pdf->Text($x, $y, $txt);
        $pdf->Rotate(0); // Rotar de vuelta a 0
    }
}
