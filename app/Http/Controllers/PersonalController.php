<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $personales = Personal::all()->load('usuario');
        return view('modulos.personal', compact('personales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'ap_pa' => 'required|string|max:255',
            'ap_ma' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios,correo',
            'telefono' => 'required|string|max:20',
            'carnet' => 'required|string|max:20|unique:usuarios,carnet',
            'fecha_contratacion' => 'required|date',
            'turno' => 'required|string|max:50',
            'rol' => 'required|string|max:50',
        ]);

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

        // Crear una nueva instancia del modelo Personal
        $personal = new Personal();
        $personal->usuario_id = $usuario->id;
        $personal->fecha_contrato = date('Y-m-d', strtotime($request->input('fecha_contratacion')));
        $personal->turno = $request->input('turno');
        $personal->cargo = $request->input('rol');
        $personal->save();

        // Redireccionar o devolver una respuesta
        return redirect()->back()->with('success', 'Personal agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personal $personal)
    {
        return json_encode($personal->load('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personal $personal)
    {
        $usuario = $personal->usuario;
        $usuario->nombre = $request->input('nombre');
        $usuario->ap_paterno = $request->input('ap_pa');
        $usuario->ap_materno = $request->input('ap_ma');
        $usuario->correo = $request->input('email');
        $usuario->telefono = $request->input('telefono');
        $usuario->carnet = $request->input('carnet');
        $usuario->save();

        $personal->fecha_contrato = date('Y-m-d', strtotime($request->input('fecha_contratacion')));
        $personal->turno = $request->input('turno');
        $personal->cargo = $request->input('rol');
        $personal->save();

        return redirect()->back()->with('success', 'Personal actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personal $personal)
    {
        //
    }
}
