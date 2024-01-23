<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\IngresoCintaSnRotulo;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngresoCintaSnRotuloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IngresoCintaSnRotulo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serie' => $this->faker->text(255),
            'almacenamiento' => $this->faker->text(255),
            'marca' => $this->faker->text(255),
            'estado_sn_rotulo_id' => \App\Models\EstadoSnRotulo::factory(),
            'rotulo_id' => \App\Models\Rotulo::factory(),
        ];
    }
}
