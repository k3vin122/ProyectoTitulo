<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\EstadoMovimiento;
use App\Http\Controllers\Controller;
use App\Http\Resources\MovimientoResource;
use App\Http\Resources\MovimientoCollection;

class EstadoMovimientoMovimientosController extends Controller
{
    public function index(
        Request $request,
        EstadoMovimiento $estadoMovimiento
    ): MovimientoCollection {
        $this->authorize('view', $estadoMovimiento);

        $search = $request->get('search', '');

        $movimientos = $estadoMovimiento
            ->movimientos()
            ->search($search)
            ->latest()
            ->paginate();

        return new MovimientoCollection($movimientos);
    }

    public function store(
        Request $request,
        EstadoMovimiento $estadoMovimiento
    ): MovimientoResource {
        $this->authorize('create', Movimiento::class);

        $validated = $request->validate([
            'cinta_id' => ['required', 'exists:cintas,id'],
            'responsable_id' => ['required', 'exists:responsables,id'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $movimiento = $estadoMovimiento->movimientos()->create($validated);

        return new MovimientoResource($movimiento);
    }
}
