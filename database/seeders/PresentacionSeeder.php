<?php

namespace Database\Seeders;

use App\Models\Presentacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresentacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Presentacion::create([
            'nombre' => 'Tableta',
        ]);

        Presentacion::create([
            'nombre' => 'Jarabe',
        ]);

        Presentacion::create([
            'nombre' => 'Inyectable',
        ]);

        Presentacion::create([
            'nombre' => 'Gotas',
        ]);

        Presentacion::create([
            'nombre' => 'Crema',
        ]);

        Presentacion::create([
            'nombre' => 'Capsula',
        ]);

        Presentacion::create([
            'nombre' => 'Suspension',
        ]);

        Presentacion::create([
            'nombre' => 'Supositorio',
        ]);

        Presentacion::create([
            'nombre' => 'Polvo',
        ]);

        Presentacion::create([
            'nombre' => 'Aerosol',
        ]);

        Presentacion::create([
            'nombre' => 'Gel',
        ]);

        Presentacion::create([
            'nombre' => 'Solucion',
        ]);

        Presentacion::create([
            'nombre' => 'Emulsion',
        ]);

        Presentacion::create([
            'nombre' => 'Pomada',
        ]);

        Presentacion::create([
            'nombre' => 'Loción',
        ]);

        Presentacion::create([
            'nombre' => 'Pastilla',
        ]);

        //Presentacion::factory(5)->create();
    }
}
