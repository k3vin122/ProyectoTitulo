<?php

namespace App\Http\Controllers\Api;

use App\Models\EstadoRotulo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\EstadoRotuloResource;
use App\Http\Resources\EstadoRotuloCollection;
use App\Http\Requests\EstadoRotuloStoreRequest;
use App\Http\Requests\EstadoRotuloUpdateRequest;

class EstadoRotuloController extends Controller
{
    public function index(Request $request): EstadoRotuloCollection
    {
        $this->authorize('view-any', EstadoRotulo::class);

        $search = $request->get('search', '');

        $estadoRotulos = EstadoRotulo::search($search)
            ->latest()
            ->paginate();

        return new EstadoRotuloCollection($estadoRotulos);
    }

    public function store(
        EstadoRotuloStoreRequest $request
    ): EstadoRotuloResource {
        $this->authorize('create', EstadoRotulo::class);

        $validated = $request->validated();

        $estadoRotulo = EstadoRotulo::create($validated);

        return new EstadoRotuloResource($estadoRotulo);
    }

    public function show(
        Request $request,
        EstadoRotulo $estadoRotulo
    ): EstadoRotuloResource {
        $this->authorize('view', $estadoRotulo);

        return new EstadoRotuloResource($estadoRotulo);
    }

    public function update(
        EstadoRotuloUpdateRequest $request,
        EstadoRotulo $estadoRotulo
    ): EstadoRotuloResource {
        $this->authorize('update', $estadoRotulo);

        $validated = $request->validated();

        $estadoRotulo->update($validated);

        return new EstadoRotuloResource($estadoRotulo);
    }

    public function destroy(
        Request $request,
        EstadoRotulo $estadoRotulo
    ): Response {
        $this->authorize('delete', $estadoRotulo);

        $estadoRotulo->delete();

        return response()->noContent();
    }
}
