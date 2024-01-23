<?php

namespace App\Http\Controllers\Api;

use App\Models\Movimiento;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\MovimientoResource;
use App\Http\Resources\MovimientoCollection;
use App\Http\Requests\MovimientoStoreRequest;
use App\Http\Requests\MovimientoUpdateRequest;

class MovimientoController extends Controller
{
    public function index(Request $request): MovimientoCollection
    {
        $this->authorize('view-any', Movimiento::class);

        $search = $request->get('search', '');

        $movimientos = Movimiento::search($search)
            ->latest()
            ->paginate();

        return new MovimientoCollection($movimientos);
    }

    public function store(MovimientoStoreRequest $request): MovimientoResource
    {
        $this->authorize('create', Movimiento::class);

        $validated = $request->validated();

        $movimiento = Movimiento::create($validated);

        return new MovimientoResource($movimiento);
    }

    public function show(
        Request $request,
        Movimiento $movimiento
    ): MovimientoResource {
        $this->authorize('view', $movimiento);

        return new MovimientoResource($movimiento);
    }

    public function update(
        MovimientoUpdateRequest $request,
        Movimiento $movimiento
    ): MovimientoResource {
        $this->authorize('update', $movimiento);

        $validated = $request->validated();

        $movimiento->update($validated);

        return new MovimientoResource($movimiento);
    }

    public function destroy(Request $request, Movimiento $movimiento): Response
    {
        $this->authorize('delete', $movimiento);

        $movimiento->delete();

        return response()->noContent();
    }
}
