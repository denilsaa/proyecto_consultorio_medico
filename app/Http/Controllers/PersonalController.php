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
        $usuario = new Usuario();
        $usuario->nombre = $request->input('nombre'); // Campo 'name' del formulario
        $usuario->ap_paterno = $request->input('ap_pa'); // Campo 'ap_pa' del formulario
        $usuario->ap_materno = $request->input('ap_ma'); // Campo 'ap_ma' del formulario
        $usuario->correo = $request->input('email'); // Campo 'email' del formulario
        $usuario->telefono = $request->input('telefono'); // Campo 'telefono' del formulario
        $usuario->carnet = $request->input('carnet'); // Campo 'carnet' del formulario

        $pass = substr($usuario->nombre, 0, 1) . substr($usuario->ap_paterno, 0, 1) . substr($usuario->ap_materno, 0, 1) . substr($usuario->carnet, -4);
        $usuario->password = bcrypt($pass); // Contraseña generada a partir de los datos del formulario
        $usuario->save(); // Guardar en la tabla usuarios

        // Crear una nueva instancia del modelo Personal
        $personal = new Personal();
        $personal->usuario_id = $usuario->id; // Asociar el ID del usuario creado
        $personal->fecha_contrato = date('Y-m-d', strtotime($request->input('fecha_contratacion')));
        $personal->turno = $request->input('turno'); // Campo 'turno' del formulario
        $personal->cargo = $request->input('rol'); // Agregar el campo 'rol' si lo necesitas
        $personal->save(); // Guardar en la tabla personal

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
