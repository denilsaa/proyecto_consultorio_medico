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

        foreach ($farmacos as $farmaco) {
            $fechaVencimiento = Carbon::parse($farmaco->fecha_vencimiento);
            if ($fechaVencimiento->diffInDays($hoy) >= 30) {
                $farmaco->estado = 0;
                $farmaco->save();
            }
        }

        $this->info('Estado de los fármacos actualizado correctamente.');
    }
}
