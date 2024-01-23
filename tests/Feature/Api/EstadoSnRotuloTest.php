<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\EstadoSnRotulo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstadoSnRotuloTest extends TestCase
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
    public function it_gets_estado_sn_rotulos_list(): void
    {
        $estadoSnRotulos = EstadoSnRotulo::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.estado-sn-rotulos.index'));

        $response->assertOk()->assertSee($estadoSnRotulos[0]->desc);
    }

    /**
     * @test
     */
    public function it_stores_the_estado_sn_rotulo(): void
    {
        $data = EstadoSnRotulo::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.estado-sn-rotulos.store'),
            $data
        );

        $this->assertDatabaseHas('estado_sn_rotulos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_estado_sn_rotulo(): void
    {
        $estadoSnRotulo = EstadoSnRotulo::factory()->create();

        $data = [
            'desc' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.estado-sn-rotulos.update', $estadoSnRotulo),
            $data
        );

        $data['id'] = $estadoSnRotulo->id;

        $this->assertDatabaseHas('estado_sn_rotulos', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_estado_sn_rotulo(): void
    {
        $estadoSnRotulo = EstadoSnRotulo::factory()->create();

        $response = $this->deleteJson(
            route('api.estado-sn-rotulos.destroy', $estadoSnRotulo)
        );

        $this->assertDeleted($estadoSnRotulo);

        $response->assertNoContent();
    }
}
