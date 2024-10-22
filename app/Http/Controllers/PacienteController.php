<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

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
        //
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
