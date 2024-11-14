<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Paciente;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'ap_paterno' => 'required|string|max:255',
            'ap_materno' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:usuarios',
            'telefono' => 'required|string|max:8',
            'telefono_emergencia' => 'required|string|max:8',
            'carnet' => 'required|string|max:255|unique:usuarios',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'ap_paterno' => $request->ap_paterno,
            'ap_materno' => $request->ap_materno,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'carnet' => $request->carnet,
            'password' => Hash::make($request->password),
        ]);

        $paciente = Paciente::create([
            'usuario_id' => $usuario->id,
            'telefono_emergencia' => $request->telefono_emergencia,
        ]);

        event(new Registered($usuario));

        Auth::login($usuario);

        return redirect(route('welcome', absolute: false));
    }
}
