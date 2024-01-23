<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Movimiento;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserMovimientosTest extends TestCase
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
    public function it_gets_user_movimientos(): void
    {
        $user = User::factory()->create();
        $movimientos = Movimiento::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.movimientos.index', $user));

        $response->assertOk()->assertSee($movimientos[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_user_movimientos(): void
    {
        $user = User::factory()->create();
        $data = Movimiento::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.movimientos.store', $user),
            $data
        );

        $this->assertDatabaseHas('movimientos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $movimiento = Movimiento::latest('id')->first();

        $this->assertEquals($user->id, $movimiento->user_id);
    }
}
