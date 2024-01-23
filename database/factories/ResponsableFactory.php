<?php

namespace Database\Factories;

use App\Models\Responsable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResponsableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Responsable::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rut' => $this->faker->text(255),
            'nombre' => $this->faker->text(255),
            'telefono' => $this->faker->text(255),
            'empresa_id' => \App\Models\Empresa::factory(),
        ];
    }
}
