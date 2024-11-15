<?php
namespace App\Livewire\Vistas;

use Livewire\Component;
use App\Models\Cita;
use Carbon\Carbon;

class Agenda extends Component
{
    public $mes;
    public $anio;

    public function mount($mes = null, $anio = null)
    {
        $this->mes = $mes ?? now()->month;  // Mes actual si no se pasa
        $this->anio = $anio ?? now()->year;  // Año actual si no se pasa
    }

    // Método para actualizar el mes y el año
    public function actualizarMes($mes, $anio)
    {
        $this->mes = $mes;
        $this->anio = $anio;
    }

    public function render()
    {
        // Filtrar las citas por el mes y el año proporcionado
        $citas = Cita::whereYear('fecha', $this->anio)
                    ->whereMonth('fecha', $this->mes)
                    ->get();

        // Formatear las citas para el calendario
        $citasPorDia = [];
        foreach ($citas as $cita) {
            // Asegurarse de que la fecha se esté manejando correctamente
            try {
                // Aquí tratamos la fecha como d/m/Y
                $fecha = Carbon::createFromFormat('d/m/Y', $cita->fecha);
                $citasPorDia[$fecha->day] = $citasPorDia[$fecha->day] ?? [];
                $citasPorDia[$fecha->day][] = $cita;
            } catch (\Exception $e) {
                // Si hay un error al convertir la fecha, mostrarlo para diagnóstico
                dd('Error al convertir fecha:', $cita->fecha, $e->getMessage());
            }
        }

        return view('livewire.vistas.agenda', [
            'citasPorDia' => $citasPorDia, // Pasa las citas agrupadas por día
            'mes' => $this->mes,           // Pasa el mes
            'anio' => $this->anio          // Pasa el año
        ]);
    }
}
