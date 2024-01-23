<?php

namespace Database\Seeders;

use App\Models\EstadoSnRotulo;
use Illuminate\Database\Seeder;

class EstadoSnRotuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstadoSnRotulo::factory()
            ->count(5)
            ->create();
    }
}
