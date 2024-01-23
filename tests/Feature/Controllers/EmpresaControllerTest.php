<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Empresa;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmpresaControllerTest extends TestCase
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
    public function it_displays_index_view_with_empresas(): void
    {
        $empresas = Empresa::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('empresas.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.empresas.index')
            ->assertViewHas('empresas');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_empresa(): void
    {
        $response = $this->get(route('empresas.create'));

        $response->assertOk()->assertViewIs('app.empresas.create');
    }

    /**
     * @test
     */
    public function it_stores_the_empresa(): void
    {
        $data = Empresa::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('empresas.store'), $data);

        $this->assertDatabaseHas('empresas', $data);

        $empresa = Empresa::latest('id')->first();

        $response->assertRedirect(route('empresas.edit', $empresa));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_empresa(): void
    {
        $empresa = Empresa::factory()->create();

        $response = $this->get(route('empresas.show', $empresa));

        $response
            ->assertOk()
            ->assertViewIs('app.empresas.show')
            ->assertViewHas('empresa');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_empresa(): void
    {
        $empresa = Empresa::factory()->create();

        $response = $this->get(route('empresas.edit', $empresa));

        $response
            ->assertOk()
            ->assertViewIs('app.empresas.edit')
            ->assertViewHas('empresa');
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

        $response = $this->put(route('empresas.update', $empresa), $data);

        $data['id'] = $empresa->id;

        $this->assertDatabaseHas('empresas', $data);

        $response->assertRedirect(route('empresas.edit', $empresa));
    }

    /**
     * @test
     */
    public function it_deletes_the_empresa(): void
    {
        $empresa = Empresa::factory()->create();

        $response = $this->delete(route('empresas.destroy', $empresa));

        $response->assertRedirect(route('empresas.index'));

        $this->assertDeleted($empresa);
    }
}
