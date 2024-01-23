<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);

        $this->call(CintaSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(EstadoMovimientoSeeder::class);
        $this->call(EstadoRotuloSeeder::class);
        $this->call(EstadoSnRotuloSeeder::class);
        $this->call(IngresoCintaSnRotuloSeeder::class);
        $this->call(MovimientoSeeder::class);
        $this->call(ResponsableSeeder::class);
        $this->call(RotuloSeeder::class);
        $this->call(UserSeeder::class);
    }
}
