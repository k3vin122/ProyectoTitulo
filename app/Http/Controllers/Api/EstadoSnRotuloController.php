<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\EstadoSnRotulo;
use App\Http\Controllers\Controller;
use App\Http\Resources\EstadoSnRotuloResource;
use App\Http\Resources\EstadoSnRotuloCollection;
use App\Http\Requests\EstadoSnRotuloStoreRequest;
use App\Http\Requests\EstadoSnRotuloUpdateRequest;

class EstadoSnRotuloController extends Controller
{
    public function index(Request $request): EstadoSnRotuloCollection
    {
        $this->authorize('view-any', EstadoSnRotulo::class);

        $search = $request->get('search', '');

        $estadoSnRotulos = EstadoSnRotulo::search($search)
            ->latest()
            ->paginate();

        return new EstadoSnRotuloCollection($estadoSnRotulos);
    }

    public function store(
        EstadoSnRotuloStoreRequest $request
    ): EstadoSnRotuloResource {
        $this->authorize('create', EstadoSnRotulo::class);

        $validated = $request->validated();

        $estadoSnRotulo = EstadoSnRotulo::create($validated);

        return new EstadoSnRotuloResource($estadoSnRotulo);
    }

    public function show(
        Request $request,
        EstadoSnRotulo $estadoSnRotulo
    ): EstadoSnRotuloResource {
        $this->authorize('view', $estadoSnRotulo);

        return new EstadoSnRotuloResource($estadoSnRotulo);
    }

    public function update(
        EstadoSnRotuloUpdateRequest $request,
        EstadoSnRotulo $estadoSnRotulo
    ): EstadoSnRotuloResource {
        $this->authorize('update', $estadoSnRotulo);

        $validated = $request->validated();

        $estadoSnRotulo->update($validated);

        return new EstadoSnRotuloResource($estadoSnRotulo);
    }

    public function destroy(
        Request $request,
        EstadoSnRotulo $estadoSnRotulo
    ): Response {
        $this->authorize('delete', $estadoSnRotulo);

        $estadoSnRotulo->delete();

        return response()->noContent();
    }
}
