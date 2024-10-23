<?php

use App\Http\Controllers\FarmacoController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\TriajeController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Constraint\Count;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/prueba', [HomeController::class, 'prueba']);

//Route::get('/', [PersonalController::class, 'index']);

Route::get('/home', HomeController::class)->name('home');

Route::resource('personal', PersonalController::class);

Route::resource('pacientes', PacienteController::class);

Route::resource('citas', CitaController::class);

Route::resource('recibos', ReciboController::class);

Route::resource('presentaciones', PresentacionController::class);

Route::resource('farmacos', FarmacoController::class);

Route::resource('historiales', HistorialController::class);

Route::resource('triajes', TriajeController::class);

Route::resource('recetas', RecetaController::class);

Route::resource('roles', RolController::class);

use App\Livewire\Counter;

Route::get('/counter', Counter::class);
