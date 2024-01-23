<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Cinta;
use App\Models\Movimiento;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CintaMovimientosTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_cinta_movimientos(): void
    {
        $cinta = Cinta::factory()->create();
        $movimientos = Movimiento::factory()
            ->count(2)
            ->create([
                'cinta_id' => $cinta->id,
            ]);

        $response = $this->getJson(
            route('api.cintas.movimientos.index', $cinta)
        );

        $response->assertOk()->assertSee($movimientos[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_cinta_movimientos(): void
    {
        $cinta = Cinta::factory()->create();
        $data = Movimiento::factory()
            ->make([
                'cinta_id' => $cinta->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.cintas.movimientos.store', $cinta),
            $data
        );

        $this->assertDatabaseHas('movimientos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $movimiento = Movimiento::latest('id')->first();

        $this->assertEquals($cinta->id, $movimiento->cinta_id);
    }
}
