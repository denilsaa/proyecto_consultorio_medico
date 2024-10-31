<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\usuario;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::select('usuarios.id as usuario_id', 'pacientes.id as paciente_id', 'usuarios.nombre', 'usuarios.ap_paterno', 'usuarios.ap_materno', 'usuarios.correo', 'usuarios.carnet', 'usuarios.estado_usuario', 'usuarios.telefono', 'pacientes.telefono_emergencia')
            ->join('usuarios', 'pacientes.usuario_id', '=', 'usuarios.id')
            ->orderBy('pacientes.id', 'DESC')
            ->get();
        //return json_encode($pacientes);
        return view('modulos.pacientes', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $usuario = new Usuario();
        $usuario->nombre = $request->input('nombre');
        $usuario->ap_paterno = $request->input('ap_pa');
        $usuario->ap_materno = $request->input('ap_ma');
        $usuario->correo = $request->input('email');
        $usuario->telefono = $request->input('telefono');
        $usuario->carnet = $request->input('carnet');

        $pass = substr($usuario->nombre, 0, 1) . substr($usuario->ap_paterno, 0, 1) . substr($usuario->ap_materno, 0, 1) . substr($usuario->carnet, -4);

        $usuario->password = bcrypt($pass);
        $usuario->save();

        // Crear una nueva instancia del modelo Paciente
        // return json_encode($request->all());
        $paciente = new Paciente();
        $paciente->usuario_id = $usuario->id;
        $paciente->telefono_emergencia = $request->input('telefono_emergencia');
        $paciente->save();
        // Redireccionar o devolver una respuesta
        return redirect()->back()->with('succes', 'Paciente agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
