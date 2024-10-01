<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personal>
 */
class PersonalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_contrato' => $this->faker->date(),
            'turno' => $this->faker->randomElement(['mañana', 'tarde', 'noche']),
            'cargo' => $this->faker->randomElement(['medico', 'enfermero', 'administrativo']),
            'usuario_id' => $this->faker->unique()->numberBetween(1, 5),
        ];
    }
}
