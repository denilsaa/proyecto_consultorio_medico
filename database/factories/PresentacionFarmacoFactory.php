<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PresentacionFarmacoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'farmaco_id' => \App\Models\Farmaco::factory(),
            'presentacion_id' => \App\Models\Presentacion::factory(),
            'cantidad' => $this->faker->numberBetween(1, 100),
            'fecha_vencimiento' => $this->faker->dateTimeBetween('-1 years', '+10 months')->format('d/m/Y'),
        ];
    }
}
