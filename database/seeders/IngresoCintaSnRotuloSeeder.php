<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IngresoCintaSnRotulo;

class IngresoCintaSnRotuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IngresoCintaSnRotulo::factory()
            ->count(5)
            ->create();
    }
}
