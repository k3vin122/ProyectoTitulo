<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Cinta;
use App\Models\IngresoCintaSnRotulo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IngresoCintaSnRotuloCintasTest extends TestCase
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
    public function it_gets_ingreso_cinta_sn_rotulo_cintas(): void
    {
        $ingresoCintaSnRotulo = IngresoCintaSnRotulo::factory()->create();
        $cintas = Cinta::factory()
            ->count(2)
            ->create([
                'ingreso_cinta_sn_rotulo_id' => $ingresoCintaSnRotulo->id,
            ]);

        $response = $this->getJson(
            route(
                'api.ingreso-cinta-sn-rotulos.cintas.index',
                $ingresoCintaSnRotulo
            )
        );

        $response->assertOk()->assertSee($cintas[0]->codigo);
    }

    /**
     * @test
     */
    public function it_stores_the_ingreso_cinta_sn_rotulo_cintas(): void
    {
        $ingresoCintaSnRotulo = IngresoCintaSnRotulo::factory()->create();
        $data = Cinta::factory()
            ->make([
                'ingreso_cinta_sn_rotulo_id' => $ingresoCintaSnRotulo->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.ingreso-cinta-sn-rotulos.cintas.store',
                $ingresoCintaSnRotulo
            ),
            $data
        );

        $this->assertDatabaseHas('cintas', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $cinta = Cinta::latest('id')->first();

        $this->assertEquals(
            $ingresoCintaSnRotulo->id,
            $cinta->ingreso_cinta_sn_rotulo_id
        );
    }
}
