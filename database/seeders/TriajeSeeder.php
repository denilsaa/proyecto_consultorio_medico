<?php

namespace Database\Seeders;

use App\Models\Triaje;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TriajeSeeder extends Seeder
{
    public function run(): void
    {
        Triaje::factory(50)->create();
    }
}
