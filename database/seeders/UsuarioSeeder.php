<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::factory(1)->create([
            'nombre' => 'Admin',
            'ap_paterno' => 'Admin',
            'ap_materno' => 'Admin',
            'correo' => 'admin@admin.com',
            'telefono' => '12345678',
            'carnet' => '12345678',
            'password' => 'admin',
        ]);
        Usuario::factory(29)->create();
    }
}
