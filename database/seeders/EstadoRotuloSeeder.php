<?php

namespace Database\Seeders;

use App\Models\EstadoRotulo;
use Illuminate\Database\Seeder;

class EstadoRotuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstadoRotulo::factory()
            ->count(5)
            ->create();
    }
}
