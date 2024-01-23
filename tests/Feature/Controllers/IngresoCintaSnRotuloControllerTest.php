<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\IngresoCintaSnRotulo;

use App\Models\Rotulo;
use App\Models\EstadoSnRotulo;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IngresoCintaSnRotuloControllerTest extends TestCase
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
    public function it_displays_index_view_with_ingreso_cinta_sn_rotulos(): void
    {
        $ingresoCintaSnRotulos = IngresoCintaSnRotulo::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('ingreso-cinta-sn-rotulos.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.ingreso_cinta_sn_rotulos.index')
            ->assertViewHas('ingresoCintaSnRotulos');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_ingreso_cinta_sn_rotulo(): void
    {
        $response = $this->get(route('ingreso-cinta-sn-rotulos.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.ingreso_cinta_sn_rotulos.create');
    }

    /**
     * @test
     */
    public function it_stores_the_ingreso_cinta_sn_rotulo(): void
    {
        $data = IngresoCintaSnRotulo::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('ingreso-cinta-sn-rotulos.store'), $data);

        $this->assertDatabaseHas('ingreso_cinta_sn_rotulos', $data);

        $ingresoCintaSnRotulo = IngresoCintaSnRotulo::latest('id')->first();

        $response->assertRedirect(
            route('ingreso-cinta-sn-rotulos.edit', $ingresoCintaSnRotulo)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_ingreso_cinta_sn_rotulo(): void
    {
        $ingresoCintaSnRotulo = IngresoCintaSnRotulo::factory()->create();

        $response = $this->get(
            route('ingreso-cinta-sn-rotulos.show', $ingresoCintaSnRotulo)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.ingreso_cinta_sn_rotulos.show')
            ->assertViewHas('ingresoCintaSnRotulo');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_ingreso_cinta_sn_rotulo(): void
    {
        $ingresoCintaSnRotulo = IngresoCintaSnRotulo::factory()->create();

        $response = $this->get(
            route('ingreso-cinta-sn-rotulos.edit', $ingresoCintaSnRotulo)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.ingreso_cinta_sn_rotulos.edit')
            ->assertViewHas('ingresoCintaSnRotulo');
    }

    /**
     * @test
     */
    public function it_updates_the_ingreso_cinta_sn_rotulo(): void
    {
        $ingresoCintaSnRotulo = IngresoCintaSnRotulo::factory()->create();

        $estadoSnRotulo = EstadoSnRotulo::factory()->create();
        $rotulo = Rotulo::factory()->create();

        $data = [
            'serie' => $this->faker->text(255),
            'almacenamiento' => $this->faker->text(255),
            'marca' => $this->faker->text(255),
            'estado_sn_rotulo_id' => $estadoSnRotulo->id,
            'rotulo_id' => $rotulo->id,
        ];

        $response = $this->put(
            route('ingreso-cinta-sn-rotulos.update', $ingresoCintaSnRotulo),
            $data
        );

        $data['id'] = $ingresoCintaSnRotulo->id;

        $this->assertDatabaseHas('ingreso_cinta_sn_rotulos', $data);

        $response->assertRedirect(
            route('ingreso-cinta-sn-rotulos.edit', $ingresoCintaSnRotulo)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_ingreso_cinta_sn_rotulo(): void
    {
        $ingresoCintaSnRotulo = IngresoCintaSnRotulo::factory()->create();

        $response = $this->delete(
            route('ingreso-cinta-sn-rotulos.destroy', $ingresoCintaSnRotulo)
        );

        $response->assertRedirect(route('ingreso-cinta-sn-rotulos.index'));

        $this->assertDeleted($ingresoCintaSnRotulo);
    }
}
