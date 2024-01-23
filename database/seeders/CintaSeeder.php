<?php

namespace Database\Seeders;

use App\Models\Cinta;
use Illuminate\Database\Seeder;

class CintaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cinta::factory()
            ->count(5)
            ->create();
    }
}
