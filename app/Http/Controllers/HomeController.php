<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Cita;
use App\Models\Farmaco;
use App\Models\Triaje;
use App\Models\Usuario;
use App\Models\Personal;
use App\Models\PresentacionFarmaco;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

class HomeController extends Controller
{
    public $pacientes;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public function __invoke()
    {
        // OBTENER LA CANTIDAD DE PACIENTES

        $cantidadPacientes = Paciente::count();
        $cantidadCitas = Cita::count();
        $cantidadFarmacos = PresentacionFarmaco::count();

        return view('modulos.home', [
            'cantidadPacientes' => $cantidadPacientes,
            'cantidadCitas' => $cantidadCitas,
            'cantidadFarmacos' => $cantidadFarmacos
        ]);
    }
    public function prueba()
    {
        $search = Str::lower($this->search);
        $query = PresentacionFarmaco::with(['farmaco', 'presentacion'])
            ->whereHas('farmaco', function ($query) use ($search) {
                $query->whereRaw('LOWER(nombre) LIKE ?', ['%' . $search . '%']);
            });

        $query->orderBy($this->sort, $this->direction);

/*         return $query->get()->map(function ($presentacionFarmaco) {
            return [
                'nombre' => $presentacionFarmaco->farmaco->nombre,
                'cantidad' => $presentacionFarmaco->cantidad,
                'fecha_vencimiento' => $presentacionFarmaco->fecha_vencimiento,
                'presentacion' => $presentacionFarmaco->presentacion->nombre
            ];
        }); */
        $query = Farmaco::all();
        return $query;
    }
}
