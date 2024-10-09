<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Presentacion>
 */
class PresentacionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
        ];
    }
}
