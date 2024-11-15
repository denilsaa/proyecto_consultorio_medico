<?php

namespace Database\Seeders;

use App\Models\Paciente;
use App\Models\Usuario;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            UsuarioSeeder::class,
            PacienteSeeder::class,
            PersonalSeeder::class,
            CitaSeeder::class,
            ReciboSeeder::class,
            PresentacionSeeder::class,
            FarmacoSeeder::class,
            HistorialSeeder::class,
            TriajeSeeder::class,
            PresentacionFarmacoSeeder::class,
            RecetaSeeder::class,
        ]);
        $user = Usuario::factory()->create([
            'correo' => 'pas@gmail.com',
            'password' => bcrypt('hola'),
        ]);

        Paciente::create([
            'telefono_emergencia' => '12345678',
            'usuario_id' => $user->id,
        ]);
    }
}
