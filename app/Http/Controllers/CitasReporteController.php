<?php
namespace App\Http\Controllers;

use App\Models\Cita;
use FPDF as GlobalFPDF;
use Illuminate\Http\Request;

class CitasReporteController extends Controller
{
    public function generarReporte()
    {
        // Obtener todas las citas
        $citas = Cita::select(
            'usuarios_paciente.nombre as paciente',
            'usuarios_paciente.carnet',
            'usuarios_paciente.telefono',
            'citas.fecha',
            'usuarios_doctor.nombre as doctor',
            'citas.confirmada'
        )
            ->join('pacientes', 'pacientes.id', '=', 'citas.paciente_id')
            ->join('usuarios as usuarios_paciente', 'usuarios_paciente.id', '=', 'pacientes.usuario_id')
            ->leftJoin('personals', 'personals.id', '=', 'citas.personal_id')
            ->leftJoin('usuarios as usuarios_doctor', 'usuarios_doctor.id', '=', 'personals.usuario_id')
            ->orderBy('citas.fecha', 'asc')
            ->get();

        // Generar el PDF
        $pdf = new GlobalFPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // Título del reporte
        $pdf->Cell(0, 10, utf8_decode('Reporte General de Citas'), 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Ln(5);

        // Encabezados de la tabla
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 10, utf8_decode('Paciente'), 1, 0, 'C'); // 50 es el ancho de la celda, 10 es la altura, 'C' es centrado, 1 es borde, 0 es no salto de línea
        $pdf->Cell(25, 10, 'Carnet', 1, 0, 'C');
        $pdf->Cell(30, 10, utf8_decode('Teléfono'), 1, 0, 'C');
        $pdf->Cell(30, 10, utf8_decode('Fecha'), 1, 0, 'C');
        $pdf->Cell(45, 10, utf8_decode('Doctor'), 1, 0, 'C');
        $pdf->Cell(20, 10, utf8_decode('Confirmada'), 1, 1, 'C');

        // Contenido de la tabla
        $pdf->SetFont('Arial', '', 10);
        foreach ($citas as $cita) {
            $pdf->Cell(40, 10, utf8_decode($cita->paciente), 1, 0, 'C');
            $pdf->Cell(25, 10, $cita->carnet, 1, 0, 'C');
            $pdf->Cell(30, 10, $cita->telefono, 1, 0, 'C');
            $pdf->Cell(30, 10, \Carbon\Carbon::createFromFormat('d/m/Y', $cita->fecha)->format('d-m-Y H:i'), 1, 0, 'C');


            $pdf->Cell(45, 10, utf8_decode($cita->doctor), 1, 0, 'C');
            $pdf->Cell(20, 10, utf8_decode($cita->confirmada ? 'Sí' : 'No'), 1, 1, 'C');
        }

        // Configurar nombre del archivo
        $nombreArchivo = 'reporte_general_citas.pdf';

        // Salida del PDF
        return response($pdf->Output('S'), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $nombreArchivo . '"');
    }
}
