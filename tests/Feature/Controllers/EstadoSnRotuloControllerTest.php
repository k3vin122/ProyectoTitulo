<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\EstadoSnRotulo;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstadoSnRotuloControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_estado_sn_rotulos(): void
    {
        $estadoSnRotulos = EstadoSnRotulo::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('estado-sn-rotulos.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.estado_sn_rotulos.index')
            ->assertViewHas('estadoSnRotulos');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_estado_sn_rotulo(): void
    {
        $response = $this->get(route('estado-sn-rotulos.create'));

        $response->assertOk()->assertViewIs('app.estado_sn_rotulos.create');
    }

    /**
     * @test
     */
    public function it_stores_the_estado_sn_rotulo(): void
    {
        $data = EstadoSnRotulo::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('estado-sn-rotulos.store'), $data);

        $this->assertDatabaseHas('estado_sn_rotulos', $data);

        $estadoSnRotulo = EstadoSnRotulo::latest('id')->first();

        $response->assertRedirect(
            route('estado-sn-rotulos.edit', $estadoSnRotulo)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_estado_sn_rotulo(): void
    {
        $estadoSnRotulo = EstadoSnRotulo::factory()->create();

        $response = $this->get(
            route('estado-sn-rotulos.show', $estadoSnRotulo)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.estado_sn_rotulos.show')
            ->assertViewHas('estadoSnRotulo');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_estado_sn_rotulo(): void
    {
        $estadoSnRotulo = EstadoSnRotulo::factory()->create();

        $response = $this->get(
            route('estado-sn-rotulos.edit', $estadoSnRotulo)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.estado_sn_rotulos.edit')
            ->assertViewHas('estadoSnRotulo');
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

        $response = $this->put(
            route('estado-sn-rotulos.update', $estadoSnRotulo),
            $data
        );

        $data['id'] = $estadoSnRotulo->id;

        $this->assertDatabaseHas('estado_sn_rotulos', $data);

        $response->assertRedirect(
            route('estado-sn-rotulos.edit', $estadoSnRotulo)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_estado_sn_rotulo(): void
    {
        $estadoSnRotulo = EstadoSnRotulo::factory()->create();

        $response = $this->delete(
            route('estado-sn-rotulos.destroy', $estadoSnRotulo)
        );

        $response->assertRedirect(route('estado-sn-rotulos.index'));

        $this->assertDeleted($estadoSnRotulo);
    }
}
