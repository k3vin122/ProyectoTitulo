<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Responsable;

use App\Models\Empresa;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResponsableTest extends TestCase
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
    public function it_gets_responsables_list(): void
    {
        $responsables = Responsable::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.responsables.index'));

        $response->assertOk()->assertSee($responsables[0]->rut);
    }

    /**
     * @test
     */
    public function it_stores_the_responsable(): void
    {
        $data = Responsable::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.responsables.store'), $data);

        $this->assertDatabaseHas('responsables', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_responsable(): void
    {
        $responsable = Responsable::factory()->create();

        $empresa = Empresa::factory()->create();

        $data = [
            'rut' => $this->faker->text(255),
            'nombre' => $this->faker->text(255),
            'telefono' => $this->faker->text(255),
            'empresa_id' => $empresa->id,
        ];

        $response = $this->putJson(
            route('api.responsables.update', $responsable),
            $data
        );

        $data['id'] = $responsable->id;

        $this->assertDatabaseHas('responsables', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_responsable(): void
    {
        $responsable = Responsable::factory()->create();

        $response = $this->deleteJson(
            route('api.responsables.destroy', $responsable)
        );

        $this->assertDeleted($responsable);

        $response->assertNoContent();
    }
}
