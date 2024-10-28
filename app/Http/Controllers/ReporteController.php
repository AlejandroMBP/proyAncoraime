<?php

namespace App\Http\Controllers;

use App\Exports\DocumentosExport;
use App\Models\Documento;
use App\Models\ImpresionDocumento;
use App\Models\PrestamoDocumento;
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
            ->where('estado', '<>', 0) // Excluye documentos con estado igual a 0
            ->get();
        if ($documentos->isEmpty()) {
            return redirect()->back()->with('error', 'No se encontraron documentos para las fechas y tipo seleccionados.');
        }
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

    public function generarReporte(Request $request)
    {
        try {
            // Validación de los datos
            $request->validate([
                'fecha_desde' => 'required|date',
                'fecha_hasta' => 'required|date|after_or_equal:fecha_desde',
                'tituloDocumento' => 'required|exists:documentos,id',
            ]);

            // Captura los datos del formulario
            $fechaDesde = $request->input('fecha_desde');
            $fechaHasta = $request->input('fecha_hasta');
            $tituloDocumentoId = $request->input('tituloDocumento');

            // Filtra los préstamos en base a las fechas y el tipo de documento
            $prestamos = PrestamoDocumento::with(['documento', 'funcionario', 'usuario'])
                ->whereHas('documento', function ($query) use ($tituloDocumentoId) {
                    $query->where('id', $tituloDocumentoId);
                })
                ->whereBetween('fecha_prestamo', [$fechaDesde, $fechaHasta])
                ->where('estado', '<>', 0) // Filtra préstamos donde estado no sea igual a 0
                ->get();

            // Genera el PDF
            $pdf = Pdf::loadView('Administrador.prestamos.PDF', compact('prestamos', 'fechaDesde', 'fechaHasta'));

            // Descarga el PDF
            return $pdf->stream('reporte_Prestamos_' . time() . '.pdf');
        } catch (\Exception $e) {
            // Manejo de excepciones
            return response()->json([
                'success' => false,
                'message' => 'Error al generar el reporte: ' . $e->getMessage(),
            ], 500); // Devuelve un error 500 con el mensaje de error
        }
    }
    public function ReporteImpresiones(Request $request)
    {
        try {
            // Validación de los datos
            $request->validate([
                'fecha_desde' => 'required|date',
                'fecha_hasta' => 'required|date|after_or_equal:fecha_desde',
            ]);

            // Captura los datos del formulario
            $fechaDesde = $request->input('fecha_desde');
            $fechaHasta = $request->input('fecha_hasta');
            $tituloDocumentoId = $request->input('tituloDocumento'); // Puede ser nulo

            // Filtra las impresiones en base a las fechas y el tipo de documento (si se proporciona)
            $impresiones = ImpresionDocumento::with(['documento', 'funcionario', 'usuario'])
                ->when($tituloDocumentoId, function ($query) use ($tituloDocumentoId) {
                    $query->where('documento_id', $tituloDocumentoId);
                })
                ->whereBetween('fecha_impresion', [$fechaDesde, $fechaHasta])
                ->where('estado', '<>', 0) // Filtra impresiones donde estado no sea igual a 0
                ->get();

            // Verifica si hay datos para mostrar
            if ($impresiones->isEmpty()) {
                return redirect()->back()->with('error', 'No se encontraron impresiones para el rango de fechas y documento seleccionados.');
            }

            // Genera el PDF
            $pdf = PDF::loadView('Administrador.impresiones.PDF', compact('impresiones', 'fechaDesde', 'fechaHasta'));

            // Descarga el PDF
            return $pdf->stream('reporte_impresiones_' . time() . '.pdf');
        } catch (\Exception $e) {
            // Manejo de excepciones
            return response()->json([
                'success' => false,
                'message' => 'Error al generar el reporte: ' . $e->getMessage(),
            ], 500);
        }
    }
}
