<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Empresa;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmpresaTest extends TestCase
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
    public function it_gets_empresas_list(): void
    {
        $empresas = Empresa::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.empresas.index'));

        $response->assertOk()->assertSee($empresas[0]->rol);
    }

    /**
     * @test
     */
    public function it_stores_the_empresa(): void
    {
        $data = Empresa::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.empresas.store'), $data);

        $this->assertDatabaseHas('empresas', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_empresa(): void
    {
        $empresa = Empresa::factory()->create();

        $data = [
            'rol' => $this->faker->text(255),
            'nombre' => $this->faker->text(255),
            'direccion' => $this->faker->text(255),
            'telefono' => $this->faker->text(255),
            'correo' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.empresas.update', $empresa),
            $data
        );

        $data['id'] = $empresa->id;

        $this->assertDatabaseHas('empresas', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_empresa(): void
    {
        $empresa = Empresa::factory()->create();

        $response = $this->deleteJson(route('api.empresas.destroy', $empresa));

        $this->assertDeleted($empresa);

        $response->assertNoContent();
    }
}
