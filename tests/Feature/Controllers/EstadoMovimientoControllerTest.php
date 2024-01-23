<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\EstadoMovimiento;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstadoMovimientoControllerTest extends TestCase
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
    public function it_displays_index_view_with_estado_movimientos(): void
    {
        $estadoMovimientos = EstadoMovimiento::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('estado-movimientos.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.estado_movimientos.index')
            ->assertViewHas('estadoMovimientos');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_estado_movimiento(): void
    {
        $response = $this->get(route('estado-movimientos.create'));

        $response->assertOk()->assertViewIs('app.estado_movimientos.create');
    }

    /**
     * @test
     */
    public function it_stores_the_estado_movimiento(): void
    {
        $data = EstadoMovimiento::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('estado-movimientos.store'), $data);

        $this->assertDatabaseHas('estado_movimientos', $data);

        $estadoMovimiento = EstadoMovimiento::latest('id')->first();

        $response->assertRedirect(
            route('estado-movimientos.edit', $estadoMovimiento)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_estado_movimiento(): void
    {
        $estadoMovimiento = EstadoMovimiento::factory()->create();

        $response = $this->get(
            route('estado-movimientos.show', $estadoMovimiento)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.estado_movimientos.show')
            ->assertViewHas('estadoMovimiento');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_estado_movimiento(): void
    {
        $estadoMovimiento = EstadoMovimiento::factory()->create();

        $response = $this->get(
            route('estado-movimientos.edit', $estadoMovimiento)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.estado_movimientos.edit')
            ->assertViewHas('estadoMovimiento');
    }

    /**
     * @test
     */
    public function it_updates_the_estado_movimiento(): void
    {
        $estadoMovimiento = EstadoMovimiento::factory()->create();

        $data = [
            'desc' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('estado-movimientos.update', $estadoMovimiento),
            $data
        );

        $data['id'] = $estadoMovimiento->id;

        $this->assertDatabaseHas('estado_movimientos', $data);

        $response->assertRedirect(
            route('estado-movimientos.edit', $estadoMovimiento)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_estado_movimiento(): void
    {
        $estadoMovimiento = EstadoMovimiento::factory()->create();

        $response = $this->delete(
            route('estado-movimientos.destroy', $estadoMovimiento)
        );

        $response->assertRedirect(route('estado-movimientos.index'));

        $this->assertDeleted($estadoMovimiento);
    }
}
