<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Movimiento;

use App\Models\Cinta;
use App\Models\Responsable;
use App\Models\EstadoMovimiento;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MovimientoControllerTest extends TestCase
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
    public function it_displays_index_view_with_movimientos(): void
    {
        $movimientos = Movimiento::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('movimientos.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.movimientos.index')
            ->assertViewHas('movimientos');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_movimiento(): void
    {
        $response = $this->get(route('movimientos.create'));

        $response->assertOk()->assertViewIs('app.movimientos.create');
    }

    /**
     * @test
     */
    public function it_stores_the_movimiento(): void
    {
        $data = Movimiento::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('movimientos.store'), $data);

        $this->assertDatabaseHas('movimientos', $data);

        $movimiento = Movimiento::latest('id')->first();

        $response->assertRedirect(route('movimientos.edit', $movimiento));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_movimiento(): void
    {
        $movimiento = Movimiento::factory()->create();

        $response = $this->get(route('movimientos.show', $movimiento));

        $response
            ->assertOk()
            ->assertViewIs('app.movimientos.show')
            ->assertViewHas('movimiento');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_movimiento(): void
    {
        $movimiento = Movimiento::factory()->create();

        $response = $this->get(route('movimientos.edit', $movimiento));

        $response
            ->assertOk()
            ->assertViewIs('app.movimientos.edit')
            ->assertViewHas('movimiento');
    }

    /**
     * @test
     */
    public function it_updates_the_movimiento(): void
    {
        $movimiento = Movimiento::factory()->create();

        $cinta = Cinta::factory()->create();
        $estadoMovimiento = EstadoMovimiento::factory()->create();
        $responsable = Responsable::factory()->create();
        $user = User::factory()->create();

        $data = [
            'cinta_id' => $cinta->id,
            'estado_movimiento_id' => $estadoMovimiento->id,
            'responsable_id' => $responsable->id,
            'user_id' => $user->id,
        ];

        $response = $this->put(route('movimientos.update', $movimiento), $data);

        $data['id'] = $movimiento->id;

        $this->assertDatabaseHas('movimientos', $data);

        $response->assertRedirect(route('movimientos.edit', $movimiento));
    }

    /**
     * @test
     */
    public function it_deletes_the_movimiento(): void
    {
        $movimiento = Movimiento::factory()->create();

        $response = $this->delete(route('movimientos.destroy', $movimiento));

        $response->assertRedirect(route('movimientos.index'));

        $this->assertDeleted($movimiento);
    }
}
