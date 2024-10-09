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

        Presentacion::factory(5)->create();
    }
}
