<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Movimiento;

use App\Models\Cinta;
use App\Models\Responsable;
use App\Models\EstadoMovimiento;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MovimientoTest extends TestCase
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
    public function it_gets_movimientos_list(): void
    {
        $movimientos = Movimiento::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.movimientos.index'));

        $response->assertOk()->assertSee($movimientos[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_movimiento(): void
    {
        $data = Movimiento::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.movimientos.store'), $data);

        $this->assertDatabaseHas('movimientos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_movimiento(): void
    {
        $movimiento = Movimiento::factory()->create();

        $cinta = Cinta::factory()->create();
        $estadoMovimiento = EstadoMovimiento::factory()->create();
        $responsable = Responsable::factory()->create();
        $user = User::factory()->create();

        $data = [
            'cinta_id' => $cinta->id,
            'estado_movimiento_id' => $estadoMovimiento->id,
            'responsable_id' => $responsable->id,
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.movimientos.update', $movimiento),
            $data
        );

        $data['id'] = $movimiento->id;

        $this->assertDatabaseHas('movimientos', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_movimiento(): void
    {
        $movimiento = Movimiento::factory()->create();

        $response = $this->deleteJson(
            route('api.movimientos.destroy', $movimiento)
        );

        $this->assertDeleted($movimiento);

        $response->assertNoContent();
    }
}
