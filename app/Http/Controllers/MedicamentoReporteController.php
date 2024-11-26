<?php
namespace App\Http\Controllers;

use FPDF as GlobalFPDF;
use App\Models\PresentacionFarmaco;
use Carbon\Carbon;

class MedicamentoReporteController extends Controller
{
    public function generarReporte()
    {
        $pdf = new GlobalFPDF('P', 'mm', 'A4');
        $pdf->AddPage();

        // Configurar para aceptar acentos
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTitle(utf8_decode('Reporte de Medicamentos'));

        // Configurar la fecha actual
        $fechaActual = Carbon::now()->format('d-m-Y'); // Ejemplo: 26-11-2024

        // Título del reporte
        $pdf->Cell(0, 10, utf8_decode('Reporte de Medicamentos'), 0, 1, 'C');
        $pdf->Ln(5); // Espacio

        // Mostrar fecha de generación
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, utf8_decode('Fecha de generación: ') . $fechaActual, 0, 1, 'L');
        $pdf->Ln(10); // Espacio

        // Configurar encabezado de tabla
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, utf8_decode('Nombre'), 1, 0, 'C');
        $pdf->Cell(30, 10, utf8_decode('Cantidad'), 1, 0, 'C');
        $pdf->Cell(50, 10, utf8_decode('Fecha de Vencimiento'), 1, 0, 'C');
        $pdf->Cell(50, 10, utf8_decode('Presentación'), 1, 1, 'C');

        // Obtener los datos
        $farmacos = PresentacionFarmaco::with(['farmaco', 'presentacion'])
            ->orderBy('Cantidad', 'desc')
            ->get()
            ->map(function ($presentacionFarmaco) {
                return [
                    'nombre' => $presentacionFarmaco->farmaco->nombre,
                    'cantidad' => $presentacionFarmaco->cantidad,
                    'fecha_vencimiento' => $presentacionFarmaco->fecha_vencimiento,
                    'presentacion' => $presentacionFarmaco->presentacion->nombre
                ];
            });

        // Calcular el total de fármacos
        $totalCantidad = $farmacos->sum('cantidad');

        // Configurar contenido de la tabla
        $pdf->SetFont('Arial', '', 12);
        foreach ($farmacos as $farmaco) {
            $pdf->Cell(50, 10, utf8_decode($farmaco['nombre']), 1, 0, 'C');
            $pdf->Cell(30, 10, $farmaco['cantidad'], 1, 0, 'C');
            $pdf->Cell(50, 10, $farmaco['fecha_vencimiento'], 1, 0, 'C');
            $pdf->Cell(50, 10, utf8_decode($farmaco['presentacion']), 1, 1, 'C');
        }

        // Agregar la fila con el total de fármacos
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, utf8_decode('Total'), 1, 0, 'C');
        $pdf->Cell(30, 10, $totalCantidad, 1, 0, 'C');
        $pdf->Cell(50, 10, '', 1, 0, 'C');
        $pdf->Cell(50, 10, '', 1, 1, 'C');

        // Configurar nombre del archivo con la fecha
        $nombreArchivo = 'reporte_farmacos_' . $fechaActual . '.pdf';

        // Salida del PDF
        return response($pdf->Output('S'), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $nombreArchivo . '"');
    }
}
