<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('modulos.recetas');
        $recetas = Receta::with('farmaco', 'historial.paciente')->get();
        $recetas = Receta::select(
            'usuarios.nombre as paciente',
            'usuarios.telefono',
            'farmacos.nombre as medicamento',
            'recetas.indicaciones',
            'recetas.cantidad',
            'recetas.created_at as fecha'
        )
            ->join('farmacos', 'farmacos.id', '=', 'recetas.farmaco_id')
            ->join('historials', 'historials.id', '=', 'recetas.historial_id')
            ->join('pacientes', 'pacientes.id', '=', 'historials.paciente_id')
            ->join('usuarios', 'usuarios.id', '=', 'pacientes.usuario_id')
            ->get();
        return json_encode($recetas);
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
    public function show(Receta $receta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
