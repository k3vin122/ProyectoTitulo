<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\EstadoRotulo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstadoRotuloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EstadoRotulo::class;

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
