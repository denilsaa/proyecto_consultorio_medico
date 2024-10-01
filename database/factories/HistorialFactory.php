<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Historial>
 */
class HistorialFactory extends Factory
{
    private static $citaId = 1;
    public function definition(): array
    {
        return [
            'cita_id' => self::$citaId++,
            'paciente_id' => $this->faker->numberBetween(1, 20),
            'diagnostico' => $this->faker->sentence(),
        ];
    }
}
