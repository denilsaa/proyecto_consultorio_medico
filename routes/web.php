<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('home');
});

Route::get('/personal', function () {
    return view('modulos.personal');
});

Route::get('/pacientes', function () {
    return view('modulos.pacientes');
});

Route::get('/roles', function () {
    return view('modulos.roles');
});

Route::get('/farmacos', function () {
    return view('modulos.farmaco');
});

Route::get('/presentaciones', function () {
    return view('modulos.presentacion');
});

Route::get('/citas', function () {
    return view('modulos.citas');
});

Route::get('/historial', function () {
    return view('modulos.historial');
});

Route::get('/recetas', function () {
    return view('modulos.recetas');
});
