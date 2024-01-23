<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Cinta;

use App\Models\IngresoCintaSnRotulo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CintaTest extends TestCase
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
    public function it_gets_cintas_list(): void
    {
        $cintas = Cinta::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.cintas.index'));

        $response->assertOk()->assertSee($cintas[0]->codigo);
    }

    /**
     * @test
     */
    public function it_stores_the_cinta(): void
    {
        $data = Cinta::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.cintas.store'), $data);

        $this->assertDatabaseHas('cintas', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_cinta(): void
    {
        $cinta = Cinta::factory()->create();

        $ingresoCintaSnRotulo = IngresoCintaSnRotulo::factory()->create();

        $data = [
            'codigo' => $this->faker->text(255),
            'almacenamiento' => $this->faker->text(255),
            'marca' => $this->faker->text(255),
            'ingreso_cinta_sn_rotulo_id' => $ingresoCintaSnRotulo->id,
        ];

        $response = $this->putJson(route('api.cintas.update', $cinta), $data);

        $data['id'] = $cinta->id;

        $this->assertDatabaseHas('cintas', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_cinta(): void
    {
        $cinta = Cinta::factory()->create();

        $response = $this->deleteJson(route('api.cintas.destroy', $cinta));

        $this->assertDeleted($cinta);

        $response->assertNoContent();
    }
}
