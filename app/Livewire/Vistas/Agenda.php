<?php
namespace App\Livewire\Vistas;

use Livewire\Component;
use App\Models\Cita;
use Carbon\Carbon;

class Agenda extends Component
{
    public $mes;
    public $anio;

    // Constructor para establecer valores predeterminados si no se pasan
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
            $fecha = Carbon::parse($cita->fecha);
            $citasPorDia[$fecha->day] = $citasPorDia[$fecha->day] ?? [];
            $citasPorDia[$fecha->day][] = $cita;
        }

        return view('livewire.vistas.agenda', [
            'citasPorDia' => $citasPorDia, // Pasa las citas agrupadas por día
            'mes' => $this->mes,           // Pasa el mes
            'anio' => $this->anio          // Pasa el año
        ]);
    }
}
