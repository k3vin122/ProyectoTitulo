<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Rotulo;

use App\Models\EstadoRotulo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RotuloTest extends TestCase
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
    public function it_gets_rotulos_list(): void
    {
        $rotulos = Rotulo::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.rotulos.index'));

        $response->assertOk()->assertSee($rotulos[0]->codigo);
    }

    /**
     * @test
     */
    public function it_stores_the_rotulo(): void
    {
        $data = Rotulo::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.rotulos.store'), $data);

        $this->assertDatabaseHas('rotulos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_rotulo(): void
    {
        $rotulo = Rotulo::factory()->create();

        $estadoRotulo = EstadoRotulo::factory()->create();

        $data = [
            'codigo' => $this->faker->text(255),
            'estado_rotulo_id' => $estadoRotulo->id,
        ];

        $response = $this->putJson(route('api.rotulos.update', $rotulo), $data);

        $data['id'] = $rotulo->id;

        $this->assertDatabaseHas('rotulos', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_rotulo(): void
    {
        $rotulo = Rotulo::factory()->create();

        $response = $this->deleteJson(route('api.rotulos.destroy', $rotulo));

        $this->assertDeleted($rotulo);

        $response->assertNoContent();
    }
}
