<?php

namespace Database\Seeders;

use App\Models\Farmaco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmacoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Farmaco::create([
            'nombre' => 'Paracetamol',
            'cantidad' => 100,
            'fecha_vencimiento' => '2022-12-31',
            'personal_id' => 1,
        ]);

        Farmaco::create([
            'nombre' => 'Ibuprofeno',
            'cantidad' => 50,
            'fecha_vencimiento' => '2022-12-31',
            'personal_id' => 1,
        ]);

        Farmaco::create([
            'nombre' => 'Omeprazol',
            'cantidad' => 30,
            'fecha_vencimiento' => '2022-12-31',
            'personal_id' => 1,
        ]);

        Farmaco::create([
            'nombre' => 'Amoxicilina',
            'cantidad' => 20,
            'fecha_vencimiento' => '2022-12-31',
            'personal_id' => 1,
        ]);

        Farmaco::create([
            'nombre' => 'Diclofenaco',
            'cantidad' => 10,
            'fecha_vencimiento' => '2022-12-31',
            'personal_id' => 1,
        ]);

        Farmaco::create([
            'nombre' => 'Dexametasona',
            'cantidad' => 5,
            'fecha_vencimiento' => '2022-12-31',
            'personal_id' => 1,
        ]);

        Farmaco::create([
            'nombre' => 'Ranitidina',
            'cantidad' => 10,
            'fecha_vencimiento' => '2022-12-31',
            'personal_id' => 1,
        ]);

        Farmaco::create([
            'nombre' => 'Metformina',
            'cantidad' => 15,
            'fecha_vencimiento' => '2022-12-31',
            'personal_id' => 1,
        ]);

        Farmaco::create([
            'nombre' => 'Clonazepam',
            'cantidad' => 10,
            'fecha_vencimiento' => '2022-12-31',
            'personal_id' => 1,
        ]);

        Farmaco::create([
            'nombre' => 'Loratadina',
            'cantidad' => 20,
            'fecha_vencimiento' => '2022-12-31',
            'personal_id' => 1,
        ]);

        //Farmaco::factory(5)->create();
    }
}
