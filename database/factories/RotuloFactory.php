<?php

namespace Database\Factories;

use App\Models\Rotulo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RotuloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rotulo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->text(255),
            'estado_rotulo_id' => \App\Models\EstadoRotulo::factory(),
        ];
    }
}
