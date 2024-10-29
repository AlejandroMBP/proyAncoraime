<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;



class documentosController extends Controller
{
    public function index()
    {
        $documentos = Documento::with('tipoDocumento', 'usuario')->get();
        $tiposDocumentos = TipoDocumento::all();
        return view('Administrador.documentos.index', compact('documentos', 'tiposDocumentos'));
    }
    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
                'hojaDeRuta' => 'required|numeric',
                'titulo' => 'required|string|max:255',
                'documentoPDF' => 'required|mimes:pdf|max:2048',
                'fecha' => 'required|date|after_or_equal:2000-01-01',
                'categoria' => 'required|exists:tipos_documentos,id',
                'cantidadFojas' => 'required|numeric|max:500',
                'nroCarpeta' => 'required|numeric|max:1000',
                'ubicacion' => 'required|string|max:255',
            ]);

            if ($request->hasFile('documentoPDF')) {
                $pdfPath = $request->file('documentoPDF')->store('documentos', 'public');
            } else {

                return redirect()->back()->withErrors(['documentoPDF' => 'El archivo PDF es requerido.']);
            }

            $documento = Documento::create([
                'hoja_ruta' => $validated['hojaDeRuta'],
                'titulo' => $validated['titulo'],
                'documento_pdf' => $pdfPath,
                'fecha' => $validated['fecha'],
                'ubicacion' => $validated['ubicacion'],
                'tipo_documento_id' => $validated['categoria'],
                'cantidad_fojas' => $validated['cantidadFojas'],
                'numero_carpeta' => $validated['nroCarpeta'],
                'codigo_qr' => 'pruebas',
                'usuario_id' => auth()->user()->id,
            ]);
            return redirect()->route('documentos.index')->with('success', 'se inserto documento exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Error al crear el documento: ' . $e->getMessage()], 500);
        }
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'hojaDeRuta' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'documentoPDF' => 'nullable|mimes:pdf|max:2048',
            'fecha' => 'required|date',
            'categoria' => 'required|exists:tipos_documentos,id',
            'cantidadFojas' => 'required|integer',
            'nroCarpeta' => 'required|integer',
            'ubicacion' => 'required|string|max:255',
        ]);

        $documento = Documento::findOrFail($id);

        $documento->hoja_ruta = $validated['hojaDeRuta'];
        $documento->titulo = $validated['titulo'];
        $documento->fecha = $validated['fecha'];
        $documento->ubicacion = $validated['ubicacion'];
        $documento->tipo_documento_id = $validated['categoria'];
        $documento->cantidad_fojas = $validated['cantidadFojas'];
        $documento->numero_carpeta = $validated['nroCarpeta'];

        if ($request->hasFile('documentoPDF')) {
            $pdfPath = $request->file('documentoPDF')->store('documentos', 'public');
            $documento->documento_pdf = $pdfPath;
        }

        $documento->save();

        return redirect()->route('documentos.index')->with('success', 'Documento actualizado exitosamente.');
    }
    public function cambioEstado($id)
    {
        try {
            $registro = Documento::findOrFail($id);

            $registro->estado = $registro->estado == 1 ? 0 : 1;

            $registro->save();

            $message = $registro->estado == 1 ? 'Documento activado exitosamente.' : 'Documento desactivado exitosamente.';
            return redirect()->route('documentos.index')->with('success', $message);
        } catch (\Exception $e) {

            return redirect()->route('documentos.index')->with('error', 'Error al cambiar el estado del documento: ' . $e->getMessage());
        }
    }
}
