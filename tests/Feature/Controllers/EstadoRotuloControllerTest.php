<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\EstadoRotulo;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstadoRotuloControllerTest extends TestCase
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
    public function it_displays_index_view_with_estado_rotulos(): void
    {
        $estadoRotulos = EstadoRotulo::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('estado-rotulos.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.estado_rotulos.index')
            ->assertViewHas('estadoRotulos');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_estado_rotulo(): void
    {
        $response = $this->get(route('estado-rotulos.create'));

        $response->assertOk()->assertViewIs('app.estado_rotulos.create');
    }

    /**
     * @test
     */
    public function it_stores_the_estado_rotulo(): void
    {
        $data = EstadoRotulo::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('estado-rotulos.store'), $data);

        $this->assertDatabaseHas('estado_rotulos', $data);

        $estadoRotulo = EstadoRotulo::latest('id')->first();

        $response->assertRedirect(route('estado-rotulos.edit', $estadoRotulo));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_estado_rotulo(): void
    {
        $estadoRotulo = EstadoRotulo::factory()->create();

        $response = $this->get(route('estado-rotulos.show', $estadoRotulo));

        $response
            ->assertOk()
            ->assertViewIs('app.estado_rotulos.show')
            ->assertViewHas('estadoRotulo');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_estado_rotulo(): void
    {
        $estadoRotulo = EstadoRotulo::factory()->create();

        $response = $this->get(route('estado-rotulos.edit', $estadoRotulo));

        $response
            ->assertOk()
            ->assertViewIs('app.estado_rotulos.edit')
            ->assertViewHas('estadoRotulo');
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

        $response = $this->put(
            route('estado-rotulos.update', $estadoRotulo),
            $data
        );

        $data['id'] = $estadoRotulo->id;

        $this->assertDatabaseHas('estado_rotulos', $data);

        $response->assertRedirect(route('estado-rotulos.edit', $estadoRotulo));
    }

    /**
     * @test
     */
    public function it_deletes_the_estado_rotulo(): void
    {
        $estadoRotulo = EstadoRotulo::factory()->create();

        $response = $this->delete(
            route('estado-rotulos.destroy', $estadoRotulo)
        );

        $response->assertRedirect(route('estado-rotulos.index'));

        $this->assertDeleted($estadoRotulo);
    }
}
