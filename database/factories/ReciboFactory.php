<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recibo>
 */
class ReciboFactory extends Factory
{
    private static $citaId = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descripcion' => $this->faker->sentence(),
            'monto' => $this->faker->randomFloat(2, 0, 1000),
            'fecha' => $this->faker->dateTimeBetween('-1 year', 'now')->format('d-m-Y'),
            'metodo_pago' => $this->faker->randomElement(['Efectivo', 'Tarjeta', 'Transferencia']),
            'cita_id' => self::$citaId++,
        ];
    }
}
