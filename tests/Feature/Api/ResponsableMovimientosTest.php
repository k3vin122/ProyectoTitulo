<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Movimiento;
use App\Models\Responsable;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResponsableMovimientosTest extends TestCase
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
    public function it_gets_responsable_movimientos(): void
    {
        $responsable = Responsable::factory()->create();
        $movimientos = Movimiento::factory()
            ->count(2)
            ->create([
                'responsable_id' => $responsable->id,
            ]);

        $response = $this->getJson(
            route('api.responsables.movimientos.index', $responsable)
        );

        $response->assertOk()->assertSee($movimientos[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_responsable_movimientos(): void
    {
        $responsable = Responsable::factory()->create();
        $data = Movimiento::factory()
            ->make([
                'responsable_id' => $responsable->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.responsables.movimientos.store', $responsable),
            $data
        );

        $this->assertDatabaseHas('movimientos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $movimiento = Movimiento::latest('id')->first();

        $this->assertEquals($responsable->id, $movimiento->responsable_id);
    }
}
