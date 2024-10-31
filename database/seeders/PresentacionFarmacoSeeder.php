<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Farmaco;
use App\Models\Presentacion;
use Illuminate\Support\Facades\DB;

class PresentacionFarmacoSeeder extends Seeder
{
    public function run(): void
    {
        $farmacos = Farmaco::all();
        $presentaciones = Presentacion::all();

        foreach ($farmacos as $farmaco) {
            foreach ($presentaciones as $presentacion) {
                DB::table('presentacion_farmaco')->insert([
                    'farmaco_id' => $farmaco->id,
                    'presentacion_id' => $presentacion->id,
                    'cantidad' => rand(1, 100),
                    'fecha_vencimiento' => now()->addDays(rand(1, 1265)),
                ]);
            }
        }
    }
}
