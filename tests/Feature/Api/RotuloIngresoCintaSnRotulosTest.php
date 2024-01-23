<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Rotulo;
use App\Models\IngresoCintaSnRotulo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RotuloIngresoCintaSnRotulosTest extends TestCase
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
    public function it_gets_rotulo_ingreso_cinta_sn_rotulos(): void
    {
        $rotulo = Rotulo::factory()->create();
        $ingresoCintaSnRotulos = IngresoCintaSnRotulo::factory()
            ->count(2)
            ->create([
                'rotulo_id' => $rotulo->id,
            ]);

        $response = $this->getJson(
            route('api.rotulos.ingreso-cinta-sn-rotulos.index', $rotulo)
        );

        $response->assertOk()->assertSee($ingresoCintaSnRotulos[0]->serie);
    }

    /**
     * @test
     */
    public function it_stores_the_rotulo_ingreso_cinta_sn_rotulos(): void
    {
        $rotulo = Rotulo::factory()->create();
        $data = IngresoCintaSnRotulo::factory()
            ->make([
                'rotulo_id' => $rotulo->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.rotulos.ingreso-cinta-sn-rotulos.store', $rotulo),
            $data
        );

        $this->assertDatabaseHas('ingreso_cinta_sn_rotulos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $ingresoCintaSnRotulo = IngresoCintaSnRotulo::latest('id')->first();

        $this->assertEquals($rotulo->id, $ingresoCintaSnRotulo->rotulo_id);
    }
}
