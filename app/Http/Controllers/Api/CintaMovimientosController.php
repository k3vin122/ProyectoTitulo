<?php

namespace App\Http\Controllers\Api;

use App\Models\Cinta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MovimientoResource;
use App\Http\Resources\MovimientoCollection;

class CintaMovimientosController extends Controller
{
    public function index(Request $request, Cinta $cinta): MovimientoCollection
    {
        $this->authorize('view', $cinta);

        $search = $request->get('search', '');

        $movimientos = $cinta
            ->movimientos()
            ->search($search)
            ->latest()
            ->paginate();

        return new MovimientoCollection($movimientos);
    }

    public function store(Request $request, Cinta $cinta): MovimientoResource
    {
        $this->authorize('create', Movimiento::class);

        $validated = $request->validate([
            'estado_movimiento_id' => [
                'required',
                'exists:estado_movimientos,id',
            ],
            'responsable_id' => ['required', 'exists:responsables,id'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $movimiento = $cinta->movimientos()->create($validated);

        return new MovimientoResource($movimiento);
    }
}
