<?php

namespace App\Http\Controllers;

use App\Exports\DocumentosExport;
use App\Models\Documento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{
    public function generarPDF(Request $request)
    {
        // Validación de entradas
        $request->validate([
            'fecha_desde' => 'required|date',
            'fecha_hasta' => 'required|date|after_or_equal:fecha_desde',
            'tipoDocumento' => 'required|exists:tipos_documentos,id',
        ]);

        $fechaDesde = $request->input('fecha_desde');
        $fechaHasta = $request->input('fecha_hasta');
        $tipoDocumentoId = $request->input('tipoDocumento');

        // Obtener los documentos filtrados
        $documentos = Documento::where('fecha', '>=', $fechaDesde)
            ->where('fecha', '<=', $fechaHasta)
            ->where('tipo_documento_id', $tipoDocumentoId)
            ->get();

        if ($documentos->isEmpty()) {
            return redirect()->back()->with('error', 'No se encontraron documentos para las fechas y tipo seleccionados.');
        }
// return $request;
         //Generar el PDF y redirigir a una vista
        $pdf = Pdf::loadView('Administrador.documentos.pdfReporte.PDF', compact('documentos'));
        return $pdf->stream('reporte_' . time() . '.pdf');
    }

    // Generar Excel
    public function generarExcel(Request $request)
    {
        // Validación de entradas
        $request->validate([
            'fecha_desde' => 'required|date',
            'fecha_hasta' => 'required|date|after_or_equal:fecha_desde',
            'tipoDocumento' => 'required|exists:tipos_documentos,id',
        ]);

        $fechaDesde = $request->input('fecha_desde');
        $fechaHasta = $request->input('fecha_hasta');
        $tipoDocumentoId = $request->input('tipoDocumento');

        // Generar Excel
        return Excel::download(new DocumentosExport($fechaDesde, $fechaHasta, $tipoDocumentoId), 'reporte_' . time() . '.xlsx');
    }
}