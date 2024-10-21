<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class ReporteController extends Controller
{
    public function generarReporte(Request $request)
    {
        // Validación de entradas
        $request->validate([
            'fecha_desde' => 'required|date',
            'fecha_hasta' => 'required|date|after_or_equal:fecha_desde',
            'categoria' => 'required|exists:tipos_documentos,id',
        ]);

        $fechaDesde = $request->input('fecha_desde');
        $fechaHasta = $request->input('fecha_hasta');
        $tipoDocumentoId = $request->input('categoria');

        // Obtener los documentos filtrados por fecha y tipo de documento
        $documentos = Documento::where('fecha', '>=', $fechaDesde)
            ->where('fecha', '<=', $fechaHasta)
            ->where('tipo_documento_id', $tipoDocumentoId)
            ->get();

        // Verificar si se encontraron documentos
        if ($documentos->isEmpty()) {
            return response()->json(['message' => 'No se encontraron documentos para las fechas y tipo seleccionados.'], 404);
        }

        // Asegúrate de que el directorio exista
        if (!file_exists(storage_path('app/public/reportes'))) {
            mkdir(storage_path('app/public/reportes'), 0755, true);
        }

        // Generar el PDF
        $pdf = PDF::loadView('reportes.pdf', compact('documentos'));

        // Guardar el PDF en el servidor
        $pdfPath = storage_path('app/public/reportes/reporte_' . time() . '.pdf');
        $pdf->save($pdfPath);

        // Devolver la ruta del PDF como respuesta
        return response()->json(['pdf_url' => asset('storage/reportes/' . basename($pdfPath))]);
    }
}
