<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MovimientoResource;
use App\Http\Resources\MovimientoCollection;

class UserMovimientosController extends Controller
{
    public function index(Request $request, User $user): MovimientoCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $movimientos = $user
            ->movimientos()
            ->search($search)
            ->latest()
            ->paginate();

        return new MovimientoCollection($movimientos);
    }

    public function store(Request $request, User $user): MovimientoResource
    {
        $this->authorize('create', Movimiento::class);

        $validated = $request->validate([
            'cinta_id' => ['required', 'exists:cintas,id'],
            'estado_movimiento_id' => [
                'required',
                'exists:estado_movimientos,id',
            ],
            'responsable_id' => ['required', 'exists:responsables,id'],
        ]);

        $movimiento = $user->movimientos()->create($validated);

        return new MovimientoResource($movimiento);
    }
}
