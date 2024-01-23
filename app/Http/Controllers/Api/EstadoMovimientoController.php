<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\EstadoMovimiento;
use App\Http\Controllers\Controller;
use App\Http\Resources\EstadoMovimientoResource;
use App\Http\Resources\EstadoMovimientoCollection;
use App\Http\Requests\EstadoMovimientoStoreRequest;
use App\Http\Requests\EstadoMovimientoUpdateRequest;

class EstadoMovimientoController extends Controller
{
    public function index(Request $request): EstadoMovimientoCollection
    {
        $this->authorize('view-any', EstadoMovimiento::class);

        $search = $request->get('search', '');

        $estadoMovimientos = EstadoMovimiento::search($search)
            ->latest()
            ->paginate();

        return new EstadoMovimientoCollection($estadoMovimientos);
    }

    public function store(
        EstadoMovimientoStoreRequest $request
    ): EstadoMovimientoResource {
        $this->authorize('create', EstadoMovimiento::class);

        $validated = $request->validated();

        $estadoMovimiento = EstadoMovimiento::create($validated);

        return new EstadoMovimientoResource($estadoMovimiento);
    }

    public function show(
        Request $request,
        EstadoMovimiento $estadoMovimiento
    ): EstadoMovimientoResource {
        $this->authorize('view', $estadoMovimiento);

        return new EstadoMovimientoResource($estadoMovimiento);
    }

    public function update(
        EstadoMovimientoUpdateRequest $request,
        EstadoMovimiento $estadoMovimiento
    ): EstadoMovimientoResource {
        $this->authorize('update', $estadoMovimiento);

        $validated = $request->validated();

        $estadoMovimiento->update($validated);

        return new EstadoMovimientoResource($estadoMovimiento);
    }

    public function destroy(
        Request $request,
        EstadoMovimiento $estadoMovimiento
    ): Response {
        $this->authorize('delete', $estadoMovimiento);

        $estadoMovimiento->delete();

        return response()->noContent();
    }
}
