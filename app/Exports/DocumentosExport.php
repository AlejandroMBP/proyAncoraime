<?php
namespace App\Exports;

use App\Models\Documento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class DocumentosExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $fechaDesde;
    protected $fechaHasta;
    protected $tipoDocumentoId;

    public function __construct($fechaDesde, $fechaHasta, $tipoDocumentoId)
    {
        $this->fechaDesde = $fechaDesde;
        $this->fechaHasta = $fechaHasta;
        $this->tipoDocumentoId = $tipoDocumentoId;
    }

    // Obtener los datos
    public function collection()
    {
        return Documento::where('fecha', '>=', $this->fechaDesde)
            ->where('fecha', '<=', $this->fechaHasta)
            ->where('tipo_documento_id', $this->tipoDocumentoId)
            ->with('tipoDocumento')
            ->get();
    }

    // Mapear datos de cada documento
    public function map($documento): array
    {
        return [
            $documento->id,
            $documento->fecha,
            $documento->tipoDocumento->descripcion,
            $documento->cantidad_fojas,
            $documento->numero_carpeta,
            $documento->ubicacion,
            $documento->fecha,
        ];
    }

    // Cabeceras del Excel
    public function headings(): array
    {
        return [
            '#',
            'Fecha',
            'Tipo Documento',
            'Cantidad de Fojas',
            'Número de Carpeta',
            'Ubicación',
            'Fecha',
        ];
    }

    // Estilos de las celdas
    public function styles(Worksheet $sheet)
    {
        // Aplicar estilo a las cabeceras (fila 1)
        $sheet->getStyle('A1:G1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => Color::COLOR_WHITE],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF538DD5'], // Fondo azul para las cabeceras
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);

        // Ajustar el tamaño de las columnas
        $sheet->getColumnDimension('A')->setWidth(5);  // ID
        $sheet->getColumnDimension('B')->setWidth(15); // Fecha
        $sheet->getColumnDimension('C')->setWidth(25); // Tipo de Documento
        $sheet->getColumnDimension('D')->setWidth(20); // Cantidad de Fojas
        $sheet->getColumnDimension('E')->setWidth(20); // Número de Carpeta
        $sheet->getColumnDimension('F')->setWidth(30); // Ubicación
        $sheet->getColumnDimension('G')->setWidth(15); // Fecha

        // Centrar el contenido de las celdas
        $sheet->getStyle('A3:G' . ($sheet->getHighestRow()))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    }
}