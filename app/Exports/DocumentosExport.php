<?php

namespace App\Exports;

use App\Models\Documento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class DocumentosExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithDrawings, WithCustomStartCell
{
    protected $fechaDesde;
    protected $fechaHasta;
    protected $tipoDocumentoId;
    protected $contador;

    public function __construct($fechaDesde, $fechaHasta, $tipoDocumentoId)
    {
        $this->fechaDesde = $fechaDesde;
        $this->fechaHasta = $fechaHasta;
        $this->tipoDocumentoId = $tipoDocumentoId;
        $this->contador = 1;
    }

    // Obtener los datos
    public function collection()
    {
        return Documento::where('fecha', '>=', $this->fechaDesde)
            ->where('fecha', '<=', $this->fechaHasta)
            ->where('tipo_documento_id', $this->tipoDocumentoId)
            ->where('estado', '<>', 0) // Excluye documentos con estado igual a 0
            ->with('tipoDocumento') // Incluye la relación tipoDocumento
            ->get();
    }

    // Mapear datos de cada documento
    public function map($documento): array
    {
        return [
            // $documento->id,
            $this->contador++,
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
        // Combinar celdas de A1 a G6 para el logo
        //$sheet->mergeCells('A1:G6');
        $sheet->mergeCells('A1:B6');
        $sheet->mergeCells('C1:G6');

        $sheet->setCellValue('C1', "GOBIERNO AUTÓNOMO MUNICIPAL DE EL ALTO\nUNIDAD DE ARCHIVOS\nDocumentos de la Direccion Administrativa Financiera");

        $sheet->getStyle('A1:B6')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);

        $sheet->getStyle('C1:G6')->applyFromArray([
            'font' => [
                'bold' => true, // Negrita
                'size' => 14,   // Tamaño de fuente (puedes ajustar según prefieras)
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER, // Centrar horizontalmente
                'vertical' => Alignment::VERTICAL_CENTER,     // Centrar verticalmente
                'wrapText' => true,                           // Permitir salto de línea en la celda
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
        // Aplicar estilo a las cabeceras (fila 10 en este caso)
        $sheet->getStyle('A7:G7')->applyFromArray([
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
                'startColor' => ['argb' => 'FF4F81BD'], // Fondo azul para las cabeceras
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);

        // Estilo alternado de las filas de datos
        $highestRow = $sheet->getHighestRow();
        for ($row = 8; $row <= $highestRow; $row++) {
            if ($row % 2 == 0) {
                $sheet->getStyle('A' . $row . ':G' . $row)->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FFE7E6E6'], // Color gris claro para las filas pares
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_MEDIUM,
                            'color' => ['argb' => 'FF000000'],
                        ],
                    ],
                ]);
            }
            $sheet->getStyle('A' . $row . ':G' . $row)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_MEDIUM,
                        'color' => ['argb' => 'FF000000'],
                    ],
                ],
            ]);
        }

        // Ajustar el tamaño de las columnas
        $sheet->getColumnDimension('A')->setWidth(5);  // ID
        $sheet->getColumnDimension('B')->setWidth(15); // Fecha
        $sheet->getColumnDimension('C')->setWidth(25); // Tipo de Documento
        $sheet->getColumnDimension('D')->setWidth(20); // Cantidad de Fojas
        $sheet->getColumnDimension('E')->setWidth(20); // Número de Carpeta
        $sheet->getColumnDimension('F')->setWidth(30); // Ubicación
        $sheet->getColumnDimension('G')->setWidth(15); // Fecha

        // Centrar el contenido de las celdas
        $sheet->getStyle('A7:G' . ($highestRow))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    }

    // Comenzar la tabla desde la celda A10
    public function startCell(): string
    {
        return 'A7';
    }

    // Agregar un logo o imagen
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        $drawing->setPath(public_path('/img/imgancoraime.jpg')); // Ruta al logo
        $drawing->setHeight(90); // Altura del logo
        $drawing->setResizeProportional(false); // Desactivar el ajuste proporcional
        $drawing->setWidth(100); // Ajustar el ancho del logo
        $drawing->setHeight(100); // Ajustar la altura del logo
        $drawing->setCoordinates('A1'); // Posición donde se insertará el logo
        $drawing->setOffsetX(20); // Ajustar el desplazamiento horizontal (ajustar el valor según la necesidad)
        $drawing->setOffsetY(10);
        return $drawing;
    }
}
