<?php

namespace Database\Seeders;

use App\Models\Rotulo;
use Illuminate\Database\Seeder;

class RotuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rotulo::factory()
            ->count(5)
            ->create();
    }
}
