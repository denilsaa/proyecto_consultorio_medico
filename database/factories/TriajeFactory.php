<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Triaje>
 */
class TriajeFactory extends Factory
{
    public function definition(): array
    {
        static $historialId = 1;
        return [
            'temperatura' => $this->faker->randomFloat(2, 35, 40),
            'peso' => $this->faker->randomFloat(2, 40, 120),
            'altura' => $this->faker->randomFloat(2, 1.5, 2.2),
            'frecuencia_cardiaca' => $this->faker->numberBetween(60, 100),
            'frecuencia_respiratoria' => $this->faker->numberBetween(12, 20),
            'presion_arterial' => $this->faker->numberBetween(60, 120),
            'historial_id' => $historialId++,
        ];
    }
}
