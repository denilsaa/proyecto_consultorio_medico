<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cita>
 */
class CitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'paciente_id' => $this->faker->numberBetween(1, 20),
            'personal_id' => $this->faker->numberBetween(1, 5),
            'fecha' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'hora' => $this->faker->time(),
            'motivo' => $this->faker->sentence(),
        ];
    }
}
