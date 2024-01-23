<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Rotulo;

use App\Models\EstadoRotulo;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RotuloControllerTest extends TestCase
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
    public function it_displays_index_view_with_rotulos(): void
    {
        $rotulos = Rotulo::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('rotulos.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.rotulos.index')
            ->assertViewHas('rotulos');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_rotulo(): void
    {
        $response = $this->get(route('rotulos.create'));

        $response->assertOk()->assertViewIs('app.rotulos.create');
    }

    /**
     * @test
     */
    public function it_stores_the_rotulo(): void
    {
        $data = Rotulo::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('rotulos.store'), $data);

        $this->assertDatabaseHas('rotulos', $data);

        $rotulo = Rotulo::latest('id')->first();

        $response->assertRedirect(route('rotulos.edit', $rotulo));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_rotulo(): void
    {
        $rotulo = Rotulo::factory()->create();

        $response = $this->get(route('rotulos.show', $rotulo));

        $response
            ->assertOk()
            ->assertViewIs('app.rotulos.show')
            ->assertViewHas('rotulo');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_rotulo(): void
    {
        $rotulo = Rotulo::factory()->create();

        $response = $this->get(route('rotulos.edit', $rotulo));

        $response
            ->assertOk()
            ->assertViewIs('app.rotulos.edit')
            ->assertViewHas('rotulo');
    }

    /**
     * @test
     */
    public function it_updates_the_rotulo(): void
    {
        $rotulo = Rotulo::factory()->create();

        $estadoRotulo = EstadoRotulo::factory()->create();

        $data = [
            'codigo' => $this->faker->text(255),
            'estado_rotulo_id' => $estadoRotulo->id,
        ];

        $response = $this->put(route('rotulos.update', $rotulo), $data);

        $data['id'] = $rotulo->id;

        $this->assertDatabaseHas('rotulos', $data);

        $response->assertRedirect(route('rotulos.edit', $rotulo));
    }

    /**
     * @test
     */
    public function it_deletes_the_rotulo(): void
    {
        $rotulo = Rotulo::factory()->create();

        $response = $this->delete(route('rotulos.destroy', $rotulo));

        $response->assertRedirect(route('rotulos.index'));

        $this->assertDeleted($rotulo);
    }
}
