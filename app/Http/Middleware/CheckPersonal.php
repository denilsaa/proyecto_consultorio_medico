<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Personal;

use Symfony\Component\HttpFoundation\Response;

class CheckPersonal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        if (!empty(Auth::user()->personal->toArray())) {
            return $next($request);
        }

        return redirect('/'); // Redirige a la página de inicio si el usuario no está en la tabla personales
    }
}
