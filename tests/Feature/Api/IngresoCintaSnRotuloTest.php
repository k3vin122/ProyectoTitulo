<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\IngresoCintaSnRotulo;

use App\Models\Rotulo;
use App\Models\EstadoSnRotulo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IngresoCintaSnRotuloTest extends TestCase
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
    public function it_gets_ingreso_cinta_sn_rotulos_list(): void
    {
        $ingresoCintaSnRotulos = IngresoCintaSnRotulo::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.ingreso-cinta-sn-rotulos.index'));

        $response->assertOk()->assertSee($ingresoCintaSnRotulos[0]->serie);
    }

    /**
     * @test
     */
    public function it_stores_the_ingreso_cinta_sn_rotulo(): void
    {
        $data = IngresoCintaSnRotulo::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.ingreso-cinta-sn-rotulos.store'),
            $data
        );

        $this->assertDatabaseHas('ingreso_cinta_sn_rotulos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_ingreso_cinta_sn_rotulo(): void
    {
        $ingresoCintaSnRotulo = IngresoCintaSnRotulo::factory()->create();

        $estadoSnRotulo = EstadoSnRotulo::factory()->create();
        $rotulo = Rotulo::factory()->create();

        $data = [
            'serie' => $this->faker->text(255),
            'almacenamiento' => $this->faker->text(255),
            'marca' => $this->faker->text(255),
            'estado_sn_rotulo_id' => $estadoSnRotulo->id,
            'rotulo_id' => $rotulo->id,
        ];

        $response = $this->putJson(
            route('api.ingreso-cinta-sn-rotulos.update', $ingresoCintaSnRotulo),
            $data
        );

        $data['id'] = $ingresoCintaSnRotulo->id;

        $this->assertDatabaseHas('ingreso_cinta_sn_rotulos', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_ingreso_cinta_sn_rotulo(): void
    {
        $ingresoCintaSnRotulo = IngresoCintaSnRotulo::factory()->create();

        $response = $this->deleteJson(
            route('api.ingreso-cinta-sn-rotulos.destroy', $ingresoCintaSnRotulo)
        );

        $this->assertDeleted($ingresoCintaSnRotulo);

        $response->assertNoContent();
    }
}
