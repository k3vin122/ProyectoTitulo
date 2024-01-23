<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Rotulo;
use App\Models\EstadoRotulo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstadoRotuloRotulosTest extends TestCase
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
    public function it_gets_estado_rotulo_rotulos(): void
    {
        $estadoRotulo = EstadoRotulo::factory()->create();
        $rotulos = Rotulo::factory()
            ->count(2)
            ->create([
                'estado_rotulo_id' => $estadoRotulo->id,
            ]);

        $response = $this->getJson(
            route('api.estado-rotulos.rotulos.index', $estadoRotulo)
        );

        $response->assertOk()->assertSee($rotulos[0]->codigo);
    }

    /**
     * @test
     */
    public function it_stores_the_estado_rotulo_rotulos(): void
    {
        $estadoRotulo = EstadoRotulo::factory()->create();
        $data = Rotulo::factory()
            ->make([
                'estado_rotulo_id' => $estadoRotulo->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.estado-rotulos.rotulos.store', $estadoRotulo),
            $data
        );

        $this->assertDatabaseHas('rotulos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $rotulo = Rotulo::latest('id')->first();

        $this->assertEquals($estadoRotulo->id, $rotulo->estado_rotulo_id);
    }
}
