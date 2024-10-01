<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Farmaco>
 */
class FarmacoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'cantidad' => $this->faker->randomNumber(3, true),
            'fecha_vencimiento' => $this->faker->date(),
            'personal_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
