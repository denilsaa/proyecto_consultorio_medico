<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Cita;
use App\Models\Farmaco;

class HomeController extends Controller
{
    public function __invoke()
    {
        // OBTENER LA CANTIDAD DE PACIENTES

        $cantidadPacientes = Paciente::count();
        $cantidadCitas = Cita::count();
        $cantidadFarmacos = Farmaco::count();

        return view('modulos.home', [
            'cantidadPacientes' => $cantidadPacientes,
            'cantidadCitas' => $cantidadCitas,
            'cantidadFarmacos' => $cantidadFarmacos
        ]);
    }
}
