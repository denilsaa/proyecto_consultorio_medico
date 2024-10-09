<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RecetaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'farmaco_id' => $this->faker->numberBetween(1, 10),
            'historial_id' => $this->faker->numberBetween(10, 50),
            'indicaciones' => $this->faker->sentence(),
            'cantidad' => $this->faker->numberBetween(1, 10),
        ];
    }
}
