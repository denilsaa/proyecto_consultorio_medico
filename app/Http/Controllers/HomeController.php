<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Cita;
use App\Models\Farmaco;
use App\Models\Triaje;
use App\Models\Usuario;
use App\Models\Paxiente;

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
    public function prueba()
    {
        $search = 'a';

        $Usuarios =
            Paciente::with('usuario')
            ->whereHas('usuario', function ($query) {
                $query->where('nombre', 'like', '%' . "" . '%')
                    ->orWhere('ap_paterno', 'like', '%' . "" . '%')
                    ->orWhere('ap_materno', 'like', '%' . "" . '%');
            })
            ->orderBy('id', 'DESC')
            ->get(['id as paciente_id', 'usuario_id', 'telefono_emergencia']);

        /*         $Usuarios =
            Paciente::join('usuarios', 'pacientes.usuario_id', '=', 'usuarios.id')
            ->where(function ($query) use ($search) {
                $query->where('usuarios.nombre', 'like', '%' . $search . '%')
                    ->orWhere('usuarios.ap_paterno', 'like', '%' . $search . '%')
                    ->orWhere('usuarios.ap_materno', 'like', '%' . $search . '%');
            })
            ->orderBy('nombre', 'asc')
            ->get([
                'pacientes.id as paciente_id',
                'pacientes.usuario_id',
                'pacientes.telefono_emergencia',
                'usuarios.nombre',
                'usuarios.ap_paterno',
                'usuarios.ap_materno',
                'usuarios.carnet',
                'usuarios.telefono'
            ]); */
        $pacientes = Paciente::whereHas('usuario', function ($query) use ($search) {
            $query->where('nombre', 'like', '%' . $search . '%')
                ->orWhere('ap_paterno', 'like', '%' . $search . '%')
                ->orWhere('ap_materno', 'like', '%' . $search . '%');
        })
            ->with(['usuario' => function ($query) {
                $query->select('id', 'nombre', 'ap_paterno', 'ap_materno', 'carnet', 'telefono');
            }])
            ->orderBy('usuarios.nombre', 'asc')
            ->get([
                'pacientes.id as paciente_id',
                'pacientes.usuario_id',
                'pacientes.telefono_emergencia'
            ]);
        return json_encode($Usuarios);
    }
}
