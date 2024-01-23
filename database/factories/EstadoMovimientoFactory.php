<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\EstadoMovimiento;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstadoMovimientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EstadoMovimiento::class;

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
