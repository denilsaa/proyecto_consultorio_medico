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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Constraint\Count;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', [HomeController::class])->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/prueba', [HomeController::class, 'prueba']);

//Route::get('/', [PersonalController::class, 'index']);

Route::get('/home', HomeController::class)->name('home')->middleware('auth', 'verified');

Route::resource('personal', PersonalController::class)->middleware('auth');

Route::resource('pacientes', PacienteController::class)->middleware('auth');

Route::resource('citas', CitaController::class)->middleware('auth');

Route::resource('recibos', ReciboController::class)->middleware('auth');

Route::resource('presentaciones', PresentacionController::class)->middleware('auth');

Route::resource('farmacos', FarmacoController::class)->middleware('auth');

Route::resource('historiales', HistorialController::class)->middleware('auth');

Route::resource('triajes', TriajeController::class)->middleware('auth');

Route::resource('recetas', RecetaController::class)->middleware('auth');

Route::resource('roles', RolController::class)->middleware('auth');

Route::get('/send-test-email', function () {
    Mail::raw('This is a test email', function ($message) {
        $message->to('test@example.com')
            ->subject('Test Email');
    });

    return 'Email sent!';
});

use App\Livewire\Counter;

Route::get('/counter', Counter::class);
