<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Empresa;
use App\Models\Responsable;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmpresaResponsablesTest extends TestCase
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
    public function it_gets_empresa_responsables(): void
    {
        $empresa = Empresa::factory()->create();
        $responsables = Responsable::factory()
            ->count(2)
            ->create([
                'empresa_id' => $empresa->id,
            ]);

        $response = $this->getJson(
            route('api.empresas.responsables.index', $empresa)
        );

        $response->assertOk()->assertSee($responsables[0]->rut);
    }

    /**
     * @test
     */
    public function it_stores_the_empresa_responsables(): void
    {
        $empresa = Empresa::factory()->create();
        $data = Responsable::factory()
            ->make([
                'empresa_id' => $empresa->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.empresas.responsables.store', $empresa),
            $data
        );

        $this->assertDatabaseHas('responsables', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $responsable = Responsable::latest('id')->first();

        $this->assertEquals($empresa->id, $responsable->empresa_id);
    }
}
