<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Movimiento;
use App\Models\EstadoMovimiento;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstadoMovimientoMovimientosTest extends TestCase
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
    public function it_gets_estado_movimiento_movimientos(): void
    {
        $estadoMovimiento = EstadoMovimiento::factory()->create();
        $movimientos = Movimiento::factory()
            ->count(2)
            ->create([
                'estado_movimiento_id' => $estadoMovimiento->id,
            ]);

        $response = $this->getJson(
            route('api.estado-movimientos.movimientos.index', $estadoMovimiento)
        );

        $response->assertOk()->assertSee($movimientos[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_estado_movimiento_movimientos(): void
    {
        $estadoMovimiento = EstadoMovimiento::factory()->create();
        $data = Movimiento::factory()
            ->make([
                'estado_movimiento_id' => $estadoMovimiento->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.estado-movimientos.movimientos.store',
                $estadoMovimiento
            ),
            $data
        );

        $this->assertDatabaseHas('movimientos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $movimiento = Movimiento::latest('id')->first();

        $this->assertEquals(
            $estadoMovimiento->id,
            $movimiento->estado_movimiento_id
        );
    }
}
