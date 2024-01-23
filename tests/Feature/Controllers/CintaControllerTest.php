<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Cinta;

use App\Models\IngresoCintaSnRotulo;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CintaControllerTest extends TestCase
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
    public function it_displays_index_view_with_cintas(): void
    {
        $cintas = Cinta::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('cintas.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.cintas.index')
            ->assertViewHas('cintas');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_cinta(): void
    {
        $response = $this->get(route('cintas.create'));

        $response->assertOk()->assertViewIs('app.cintas.create');
    }

    /**
     * @test
     */
    public function it_stores_the_cinta(): void
    {
        $data = Cinta::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('cintas.store'), $data);

        $this->assertDatabaseHas('cintas', $data);

        $cinta = Cinta::latest('id')->first();

        $response->assertRedirect(route('cintas.edit', $cinta));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_cinta(): void
    {
        $cinta = Cinta::factory()->create();

        $response = $this->get(route('cintas.show', $cinta));

        $response
            ->assertOk()
            ->assertViewIs('app.cintas.show')
            ->assertViewHas('cinta');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_cinta(): void
    {
        $cinta = Cinta::factory()->create();

        $response = $this->get(route('cintas.edit', $cinta));

        $response
            ->assertOk()
            ->assertViewIs('app.cintas.edit')
            ->assertViewHas('cinta');
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

        $response = $this->put(route('cintas.update', $cinta), $data);

        $data['id'] = $cinta->id;

        $this->assertDatabaseHas('cintas', $data);

        $response->assertRedirect(route('cintas.edit', $cinta));
    }

    /**
     * @test
     */
    public function it_deletes_the_cinta(): void
    {
        $cinta = Cinta::factory()->create();

        $response = $this->delete(route('cintas.destroy', $cinta));

        $response->assertRedirect(route('cintas.index'));

        $this->assertDeleted($cinta);
    }
}
