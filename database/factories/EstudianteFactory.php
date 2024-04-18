<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->words(4, true), // words() espera un número de palabras y un booleano opcional para indicar si se devuelven como string
            'apellido' => $this->faker->words(4, true),
            'padre_id' => $this->faker->numberBetween(1, 3),
            'grado_id'=> $this->faker->numberBetween(1, 6),
        ];
    }
}
