<?php

namespace Database\Seeders;

use App\Models\Personal;
use Faker\Provider\ar_EG\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*         Personal::factory(1)->create([
            'fecha_contrato' => '2021-01-01',
            'turno' => 'mañana',
            'cargo' => 'medico',
            'usuario_id' => 1,
        ]); */
        Personal::factory(5)->create();
    }
}
