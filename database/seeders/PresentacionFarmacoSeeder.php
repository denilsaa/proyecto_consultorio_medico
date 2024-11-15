<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Farmaco;
use App\Models\Presentacion;
use App\Models\PresentacionFarmaco;
use Illuminate\Support\Facades\DB;

class PresentacionFarmacoSeeder extends Seeder
{
    public function run(): void
    {

        $farmacos = Farmaco::all();
        $presentaciones = Presentacion::all();

        foreach ($farmacos as $farmaco) {
            $randomPresentaciones = $presentaciones->random(rand(1, $presentaciones->count()));
            foreach ($randomPresentaciones as $presentacion) {
                PresentacionFarmaco::factory()->create([
                    'farmaco_id' => $farmaco->id,
                    'presentacion_id' => $presentacion->id,
                ]);
            }
        }
    }
}
