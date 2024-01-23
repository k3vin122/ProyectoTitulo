<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\EstadoSnRotulo;
use App\Models\IngresoCintaSnRotulo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstadoSnRotuloIngresoCintaSnRotulosTest extends TestCase
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
    public function it_gets_estado_sn_rotulo_ingreso_cinta_sn_rotulos(): void
    {
        $estadoSnRotulo = EstadoSnRotulo::factory()->create();
        $ingresoCintaSnRotulos = IngresoCintaSnRotulo::factory()
            ->count(2)
            ->create([
                'estado_sn_rotulo_id' => $estadoSnRotulo->id,
            ]);

        $response = $this->getJson(
            route(
                'api.estado-sn-rotulos.ingreso-cinta-sn-rotulos.index',
                $estadoSnRotulo
            )
        );

        $response->assertOk()->assertSee($ingresoCintaSnRotulos[0]->serie);
    }

    /**
     * @test
     */
    public function it_stores_the_estado_sn_rotulo_ingreso_cinta_sn_rotulos(): void
    {
        $estadoSnRotulo = EstadoSnRotulo::factory()->create();
        $data = IngresoCintaSnRotulo::factory()
            ->make([
                'estado_sn_rotulo_id' => $estadoSnRotulo->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.estado-sn-rotulos.ingreso-cinta-sn-rotulos.store',
                $estadoSnRotulo
            ),
            $data
        );

        $this->assertDatabaseHas('ingreso_cinta_sn_rotulos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $ingresoCintaSnRotulo = IngresoCintaSnRotulo::latest('id')->first();

        $this->assertEquals(
            $estadoSnRotulo->id,
            $ingresoCintaSnRotulo->estado_sn_rotulo_id
        );
    }
}
