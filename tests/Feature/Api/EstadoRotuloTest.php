<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\EstadoRotulo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstadoRotuloTest extends TestCase
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
    public function it_gets_estado_rotulos_list(): void
    {
        $estadoRotulos = EstadoRotulo::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.estado-rotulos.index'));

        $response->assertOk()->assertSee($estadoRotulos[0]->desc);
    }

    /**
     * @test
     */
    public function it_stores_the_estado_rotulo(): void
    {
        $data = EstadoRotulo::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.estado-rotulos.store'), $data);

        $this->assertDatabaseHas('estado_rotulos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_estado_rotulo(): void
    {
        $estadoRotulo = EstadoRotulo::factory()->create();

        $data = [
            'desc' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.estado-rotulos.update', $estadoRotulo),
            $data
        );

        $data['id'] = $estadoRotulo->id;

        $this->assertDatabaseHas('estado_rotulos', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_estado_rotulo(): void
    {
        $estadoRotulo = EstadoRotulo::factory()->create();

        $response = $this->deleteJson(
            route('api.estado-rotulos.destroy', $estadoRotulo)
        );

        $this->assertDeleted($estadoRotulo);

        $response->assertNoContent();
    }
}
