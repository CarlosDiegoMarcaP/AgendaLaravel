<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mensaje;
use App\Models\Amigo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends Factory<Model>
 */
class MensajeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Mensaje::class;
    public function definition(): array
    {
        return [
            'per_cod' => Amigo::inRandomOrder()->first()->per_cod,
            'email' => $this->faker->unique()->safeEmail,
            'titulo' => $this->faker->text,
            'mensaje' => $this->faker->text,
        ];
    }
}
