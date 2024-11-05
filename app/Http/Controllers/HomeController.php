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
        $query = Personal::query()->with('usuario')
            ->whereHas('usuario', function ($query) use ($search) {
                $query->where('nombre', 'like', '%' . $search . '%')
                    ->orWhere('ap_paterno', 'like', '%' . $search . '%')
                    ->orWhere('ap_materno', 'like', '%' . $search . '%');
            });

        if (in_array($this->sort, ['nombre', 'ap_paterno', 'ap_materno', 'carnet'])) {
            $query->join('usuarios', 'personals.usuario_id', '=', 'usuarios.id')
                ->orderBy('usuarios.' . $this->sort, $this->direction);
        } else {
            $query->orderBy('personals.' . $this->sort, $this->direction);
        }

        return $query->paginate(5);
    }
}
