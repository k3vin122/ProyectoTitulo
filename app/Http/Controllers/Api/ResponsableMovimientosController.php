<?php

namespace App\Http\Controllers\Api;

use App\Models\Responsable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MovimientoResource;
use App\Http\Resources\MovimientoCollection;

class ResponsableMovimientosController extends Controller
{
    public function index(
        Request $request,
        Responsable $responsable
    ): MovimientoCollection {
        $this->authorize('view', $responsable);

        $search = $request->get('search', '');

        $movimientos = $responsable
            ->movimientos()
            ->search($search)
            ->latest()
            ->paginate();

        return new MovimientoCollection($movimientos);
    }

    public function store(
        Request $request,
        Responsable $responsable
    ): MovimientoResource {
        $this->authorize('create', Movimiento::class);

        $validated = $request->validate([
            'cinta_id' => ['required', 'exists:cintas,id'],
            'estado_movimiento_id' => [
                'required',
                'exists:estado_movimientos,id',
            ],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $movimiento = $responsable->movimientos()->create($validated);

        return new MovimientoResource($movimiento);
    }
}
