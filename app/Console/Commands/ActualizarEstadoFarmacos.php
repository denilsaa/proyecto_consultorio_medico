<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PresentacionFarmaco;
use Carbon\Carbon;

class ActualizarEstadoFarmacos extends Command
{
    protected $signature = 'actualizar-farmacos';

    protected $description = 'Command description';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $farmacos = PresentacionFarmaco::all();
        $hoy = Carbon::now();
        $farmacosActualizados = 0;

        foreach ($farmacos as $farmaco) {
            try {
                $fechaVencimiento = Carbon::createFromFormat('d/m/Y', $farmaco->fecha_vencimiento);
            } catch (\Exception $e) {
                $this->error("Error al parsear la fecha de vencimiento del fármaco ID: {$farmaco->id}. Fecha: {$farmaco->fecha_vencimiento}");
                continue;
            }

            $diferenciaDias = $hoy->diffInDays($fechaVencimiento, false);

            $this->info("Fármaco ID: {$farmaco->id}, Fecha Vencimiento: {$farmaco->fecha_vencimiento}, Días hasta vencimiento: {$diferenciaDias}");

            if ($diferenciaDias < 30 && $diferenciaDias > 1) {
                $farmaco->estado = 2;
                $farmaco->save();
                $farmacosActualizados++;
                $this->info("Fármaco ID: {$farmaco->id} actualizado a estado 2");
            } elseif ($diferenciaDias <= 1) {
                $farmaco->estado = 0;
                $farmaco->save();
                $farmacosActualizados++;
                $this->info("Fármaco ID: {$farmaco->id} actualizado a estado 0");
            }
        }

        $this->info("Estado de los fármacos actualizado correctamente. Total actualizados: {$farmacosActualizados}");
    }
}
