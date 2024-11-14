<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('hola', function () {
    $this->info('Hola, este es un comando de prueba.');
})->purpose('Descripción del comando Hola')->daily();

Artisan::command('actualizar-farmacos', function () {
    $this->info('Estado de los fármacos actualizado correctamente.');
})->purpose('Actuliza el estado de los farmacos ')->daily();
