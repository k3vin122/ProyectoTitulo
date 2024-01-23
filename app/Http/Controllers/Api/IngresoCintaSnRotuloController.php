<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\IngresoCintaSnRotulo;
use App\Http\Controllers\Controller;
use App\Http\Resources\IngresoCintaSnRotuloResource;
use App\Http\Resources\IngresoCintaSnRotuloCollection;
use App\Http\Requests\IngresoCintaSnRotuloStoreRequest;
use App\Http\Requests\IngresoCintaSnRotuloUpdateRequest;

class IngresoCintaSnRotuloController extends Controller
{
    public function index(Request $request): IngresoCintaSnRotuloCollection
    {
        $this->authorize('view-any', IngresoCintaSnRotulo::class);

        $search = $request->get('search', '');

        $ingresoCintaSnRotulos = IngresoCintaSnRotulo::search($search)
            ->latest()
            ->paginate();

        return new IngresoCintaSnRotuloCollection($ingresoCintaSnRotulos);
    }

    public function store(
        IngresoCintaSnRotuloStoreRequest $request
    ): IngresoCintaSnRotuloResource {
        $this->authorize('create', IngresoCintaSnRotulo::class);

        $validated = $request->validated();

        $ingresoCintaSnRotulo = IngresoCintaSnRotulo::create($validated);

        return new IngresoCintaSnRotuloResource($ingresoCintaSnRotulo);
    }

    public function show(
        Request $request,
        IngresoCintaSnRotulo $ingresoCintaSnRotulo
    ): IngresoCintaSnRotuloResource {
        $this->authorize('view', $ingresoCintaSnRotulo);

        return new IngresoCintaSnRotuloResource($ingresoCintaSnRotulo);
    }

    public function update(
        IngresoCintaSnRotuloUpdateRequest $request,
        IngresoCintaSnRotulo $ingresoCintaSnRotulo
    ): IngresoCintaSnRotuloResource {
        $this->authorize('update', $ingresoCintaSnRotulo);

        $validated = $request->validated();

        $ingresoCintaSnRotulo->update($validated);

        return new IngresoCintaSnRotuloResource($ingresoCintaSnRotulo);
    }

    public function destroy(
        Request $request,
        IngresoCintaSnRotulo $ingresoCintaSnRotulo
    ): Response {
        $this->authorize('delete', $ingresoCintaSnRotulo);

        $ingresoCintaSnRotulo->delete();

        return response()->noContent();
    }
}
