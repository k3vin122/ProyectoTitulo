<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Responsable;

use App\Models\Empresa;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResponsableControllerTest extends TestCase
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
    public function it_displays_index_view_with_responsables(): void
    {
        $responsables = Responsable::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('responsables.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.responsables.index')
            ->assertViewHas('responsables');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_responsable(): void
    {
        $response = $this->get(route('responsables.create'));

        $response->assertOk()->assertViewIs('app.responsables.create');
    }

    /**
     * @test
     */
    public function it_stores_the_responsable(): void
    {
        $data = Responsable::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('responsables.store'), $data);

        $this->assertDatabaseHas('responsables', $data);

        $responsable = Responsable::latest('id')->first();

        $response->assertRedirect(route('responsables.edit', $responsable));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_responsable(): void
    {
        $responsable = Responsable::factory()->create();

        $response = $this->get(route('responsables.show', $responsable));

        $response
            ->assertOk()
            ->assertViewIs('app.responsables.show')
            ->assertViewHas('responsable');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_responsable(): void
    {
        $responsable = Responsable::factory()->create();

        $response = $this->get(route('responsables.edit', $responsable));

        $response
            ->assertOk()
            ->assertViewIs('app.responsables.edit')
            ->assertViewHas('responsable');
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

        $response = $this->put(
            route('responsables.update', $responsable),
            $data
        );

        $data['id'] = $responsable->id;

        $this->assertDatabaseHas('responsables', $data);

        $response->assertRedirect(route('responsables.edit', $responsable));
    }

    /**
     * @test
     */
    public function it_deletes_the_responsable(): void
    {
        $responsable = Responsable::factory()->create();

        $response = $this->delete(route('responsables.destroy', $responsable));

        $response->assertRedirect(route('responsables.index'));

        $this->assertDeleted($responsable);
    }
}
