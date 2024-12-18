<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'ap_paterno' => fake()->lastName(),
            'ap_materno' => fake()->lastName(),
            'correo' => fake()->unique()->safeEmail(),
            'correo_verified_at' => now(),
            'telefono' => fake()->randomNumber(8),
            'carnet' => fake()->unique()->numberBetween(10000000, 99999999),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'correo_verified_at' => null,
        ]);
    }
}
