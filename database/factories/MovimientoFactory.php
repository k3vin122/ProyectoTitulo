<?php

namespace Database\Factories;

use App\Models\Movimiento;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovimientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movimiento::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cinta_id' => \App\Models\Cinta::factory(),
            'estado_movimiento_id' => \App\Models\EstadoMovimiento::factory(),
            'responsable_id' => \App\Models\Responsable::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
