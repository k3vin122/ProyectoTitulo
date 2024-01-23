<?php

namespace Database\Factories;

use App\Models\Cinta;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CintaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cinta::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->text(255),
            'almacenamiento' => $this->faker->text(255),
            'marca' => $this->faker->text(255),
            'ingreso_cinta_sn_rotulo_id' => \App\Models\IngresoCintaSnRotulo::factory(),
        ];
    }
}
