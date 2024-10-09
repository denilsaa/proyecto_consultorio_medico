<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('modulos.citas');
        //$citas = Cita::with('paciente.usuario', 'personal.usuario', 'historials')->get();
        $citas = Cita::select(
            'usuarios_paciente.nombre as nombre_paciente',
            'usuarios_paciente.carnet',
            'usuarios_paciente.telefono',
            'citas.fecha',
            'usuarios_doctor.nombre as doctor',
            'citas.confirmada'
        )
            ->join('pacientes', 'pacientes.id', '=', 'citas.paciente_id')
            ->join('usuarios as usuarios_paciente', 'usuarios_paciente.id', '=', 'pacientes.usuario_id')
            ->join('personals', 'personals.id', '=', 'citas.personal_id')
            ->join('usuarios as usuarios_doctor', 'usuarios_doctor.id', '=', 'personals.usuario_id')
            ->get();
        return response()->json($citas);
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
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        //
    }
}
