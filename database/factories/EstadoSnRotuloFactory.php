<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\EstadoSnRotulo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstadoSnRotuloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EstadoSnRotulo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'desc' => $this->faker->text(255),
        ];
    }
}
